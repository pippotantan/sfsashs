<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Strand;

class DataFetchController extends Controller
{
    function fetch_strand_data(Request $request){
        if($request->ajax()){
            $strand_foot = '';
            $strand_corousel = '';
            $carousel_indicator = '';
            $strand_submenu = '';
            $ctr=0;

            $strands = Strand::all();

            $strand_count = $strands->count();

            if($strand_count>0){
                
                foreach($strands as $strand){
                    
                    $cls = $ctr==0 ? 'active' : '';
                    
                    $strand_foot.= '
                        <p>
                            <a href=/strands/' . $strand->id. '>' . $strand->strand . '</a>
                        </p>
                    ';
                  
                    $strand_submenu.= '
                        <a class="dropdown-item" href=/strands/' . $strand->id. '>' . $strand->strand . '</a>
                    ';
              
                    
                    $pic = asset("../images/") . '/' . $strand->strandpic;
                    $strand_corousel .= '
                        <div class="carousel-item '. $cls.'">
                            <img class="img-fluid rounded d-block h-100" src="'.$pic.'" alt="">
                            <div class="carousel-caption d-none d-md-block">
                                <a class="btn btn-outline-info" href="/strands/'.$strand->id.'">' . $strand->strand . '</a>
                                <p style="text-shadow:2px 2px 4px #000000">' . $strand->short_desc . '</p>
                            </div>
                        </div>
                    ';

                    $carousel_indicator .='
                        <li data-target="#main" data-slide-to="' . $ctr . '" class="' . $cls .'"></li>
                    ';
                        $ctr++;
              
                }
            }else{
                    $strand_foot .= '<p>No Strands Available</p>';
                    $strand_submenu .= '<a class="dropdown-item ">No Strands Available</a>';

                    $strand_corousel .= '
                    <div class="carousel-item active">
                        <img class="img-fluid rounded" src="http://placehold.it/900x400" alt="">
                        <div class="carousel-caption d-none d-md-block">
                            <h3>Strand Unavailable</h3>
                            <p>This is a description for the first slide.</p>
                        </div>
                    </div>
                    ';

                    $carousel_indicator .='
                    <li data-target="#main" data-slide-to="0" class="active"></li>
                ';
    

              
            }

            $strands = array(
                'footer_strand_data' => $strand_foot,
                'corousel_indic_data' => $carousel_indicator,
                'strand_corou_data' => $strand_corousel,
                'strand_sub_menu' => $strand_submenu,
                
                
            );

            echo json_encode($strands);

        }
    }
}

