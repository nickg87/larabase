<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Page;

class SearchController extends Controller
{
    //
    public function getSearch()
    {
        //get keywords input for search
        $keyword = Input::get ( 'q' );
        if($keyword != "/search"){
            $result = Page::
                        where ( 'title', 'LIKE', '%' . $keyword . '%' )
                        ->orWhere ( 'short', 'LIKE', '%' . $keyword . '%' )
                        ->orWhere ( 'body', 'LIKE', '%' . $keyword . '%' )
                        ->paginate(3)
                        ->setPath ( '' );
            $pagination = $result->appends ( array (
                'q' => Input::get ( 'q' )
            ) );
            if (count ( $result ) > 0) {
                //dd($result);
                return view ( 'front.search' )->withResult ( $result )->withKeyword ( $keyword );
            } else {
                return view( 'front.search' )->withMessage ( 'No data found. Try to search again !' )->withKeyword ( $keyword );
            }
        }  else {
            #dump('no keyword');
            #dd('test');
            $keyword='please enter a keyword to search for!';
            return view( 'front.search' )->withMessage ( 'No data found. Try to search again !' )->withKeyword ( $keyword );
        }
    }
}
