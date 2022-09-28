<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fes;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\File;
use ZipArchive;

class FesController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function index()
    {
        $fes = Fes::all();
        return view('user.fes.fe', compact( 'fes' ));
    }

    public function create()
    {
        return view('user.fes.newFe');
    }

    public function store(Request $request)
    {
        $request->validate( [
            'site_id' => 'required',
            'DT' => 'required',
            'SSV2G' => 'required|mimes:xls,pdf,xlsx',
            'SSV3G' => 'required|mimes:xls,pdf,xlsx',
            'picture' => 'required|mimes:png,jpg,jpeg',
        ] );
        if ( ( $request->file( 'DT' ) && $request->file( 'SSV2G' ) && $request->file( 'SSV3G' ) && $request->file( 'picture' ) ) ) {
            $file1 = $request->file( 'DT' );
            $file2 = $request->file( 'SSV2G' );
            $file3 = $request->file( 'SSV3G' );
            $file4 = $request->file( 'picture' );
            $imageName1 = $file1->getClientOriginalName();
            $imageName2 = $file2->getClientOriginalName();
            $imageName3 = $file3->getClientOriginalName();
            $imageName4 = $file4->getClientOriginalName();
            $file1->move( public_path( 'Sites/'.$request->site_id ), $imageName1 );
            $file2->move( public_path( 'Sites/'.$request->site_id ), $imageName2 );
            $file3->move( public_path( 'Sites/'.$request->site_id ), $imageName3 );
            $file4->move( public_path( 'Sites/'.$request->site_id ), $imageName4 );

            Fes::create( [
                'site_id' =>$request->site_id,
                'DT' =>$imageName1,
                'SSV2G' =>$imageName2,
                'SSV3G' =>$imageName3,
                'picture' =>$imageName4,
            ] );
        }
        return Redirect::to('fes')->with( 'status', 'Fes has created Success👍👍!!' );
    }

    public function show($id)
    {
        $fes = Fes::find($id);
        return view('user.fes.viewFe', compact('fes'));
    }


    public function edit($id)
    {
        $fes = Fes::find( $id );
        return view('user.fes.editFe', compact('fes'));
    }

    public function update(Request $request, $fes)
    {
        $sites = Fes::find($fes);

        $request->validate( [
            'site_id' => [ 'required', 'min:14' ],
            'DT' => ['required'],
            'SSV2G' => 'required|mimes:xls,pdf,xlsx',
            'SSV3G' => 'required|mimes:xls,pdf,xlsx',
            'picture' => 'required|mimes:png,jpg,jpeg',
        ] );

        $sites->site_id = $request->input( 'site_id' );

        if ( ( $request->file( 'DT' ) && $request->file( 'SSV2G' ) && $request->file( 'SSV3G' ) && $request->file( 'picture' ) ) ) {

            $destination1 = 'Sites/'.$sites->site_id.'/'.$sites->DT;
            $destination2 = 'Sites/'.$sites->site_id.'/'.$sites->SSV2G;
            $destination3 = 'Sites/'.$sites->site_id.'/'.$sites->SSV3G;
            $destination4 = 'Sites/'.$sites->site_id.'/'.$sites->picture;

            if ( File::exists( $destination1 ) || File::exists( $destination2 ) || File::exists( $destination3 ) || File::exists( $destination4 ) ) {

                File::delete( $destination1 );
                File::delete( $destination2 );
                File::delete( $destination3 );
                File::delete( $destination4 );
                File::deleteDirectory( 'Sites/'.$sites->site_id );
            }
            $file1 = $request->file( 'DT' );
            $file2 = $request->file( 'SSV2G' );
            $file3 = $request->file( 'SSV3G' );
            $file4 = $request->file( 'picture' );
            $imageName1 = $file1->getClientOriginalName();
            $imageName2 = $file2->getClientOriginalName();
            $imageName3 = $file3->getClientOriginalName();
            $imageName4 = $file4->getClientOriginalName();
            $file1->move( public_path( 'Sites/'.$sites->site_id.'/' ), $imageName1 );
            $file2->move( public_path( 'Sites/'.$sites->site_id.'/' ), $imageName2 );
            $file3->move( public_path( 'Sites/'.$sites->site_id.'/' ), $imageName3 );
            $file4->move( public_path( 'Sites/'.$sites->site_id.'/' ), $imageName4 );
            $sites->DT = $imageName1;
            $sites->SSV2G = $imageName2;
            $sites->SSV3G = $imageName3;
            $sites->picture = $imageName4;
            $sites->update();
        }

        return Redirect::to('fes')->with( 'status', 'Updated Successfully👍👍!!' );
    }

    public function destroy($fes)
    {

        $sites = Fes::find( $fes );
        $destination1 = 'Sites/'.$sites->site_id.'/'.$sites->DT;
        $destination2 = 'Sites/'.$sites->site_id.'/'.$sites->SSV2G;
        $destination3 = 'Sites/'.$sites->site_id.'/'.$sites->SSV3G;
        $destination4 = 'Sites/'.$sites->site_id.'/'.$sites->picture;
        if ( File::exists( $destination1 ) || File::exists( $destination2 ) || File::exists( $destination3 ) || File::exists( $destination4 ) ) {
            File::delete( $destination1 );
            File::delete( $destination2 );
            File::delete( $destination3 );
            File::delete( $destination4 );
            File::deleteDirectory( 'Sites/'.$sites->site_id );
        }
        $sites->delete();

        return Redirect::to('fes')->with( 'status', 'Sites has deleted Success👍👍!!' );
    }

    function downloader( $file ) {

        $sites = Fes::find( $file );
        $zip = new ZipArchive;

        $fileName = $sites->site_id.'.zip';

        if ( $zip->open( public_path( $fileName ), ZipArchive::CREATE ) === TRUE ) {
            $files = File::files( public_path( 'Sites/'.$sites->site_id ) );

            foreach ( $files as $key => $value ) {
                $relativeNameInZipFile = basename( $value );
                $zip->addFile( $value, $relativeNameInZipFile );
            }

            $zip->close();
        }
        return response()->download( public_path( $fileName ) );
    }
}
