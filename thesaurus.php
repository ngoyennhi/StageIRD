<?php
include('lib_thesaurus.php');
// $lib_thesaurus = array(
//     // 'Google' => 'http://google.com',
//     // 'Facebook' => 'http://facebook.com'
//     'landUse'=>'https://gcmd.earthdata.nasa.gov/kms/concept/e5815f58-8232-4c7f-b50d-ea71d73891a9',

// );

// foreach($lib_thesaurus as $title_thesaurus => $url){
//     // echo '<a href="' . $url . '">' . $title . '</a>';
//  }
//$keyword_platform = 'landCover';
/**
 * Thesaurus URI
 */
// function get_url($line){
//     //get url 
//     $url_thesaurus = strrchr($line,';');
//     return $url_thesaurus;
// };
// function get_url_list($keyword){
// //find all url by keywords

// $url_thesaurus_arr[]= get_url(preg_grep($keyword, file('lib_thesaurus.php')));
// //$url_thesaurus_arr[]= get_url(preg_match($keyword, file('lib_thesaurus.txt')));

// //return $url_thesaurus_arr;
// }


function addKeyword($dom,$node,$keyword,$lib_thesaurus){
    // $lib_thesaurus = array(
    // array("Land cover" => "https://gcmd.earthdata.nasa.gov/kms/concept/e5815f58-8232-4c7f-b50d-ea71d73891a9"),
    // array("Sentinel - 2" =>"https://gcmd.earthdata.nasa.gov/kms/concept/2ce20983-98b2-40b9-bb0e-a08074fb93b3"),
    // array("Land cover classification" => "https://gcmd.earthdata.nasa.gov/kms/concept/75c312bc-79f9-4d74-a7c0-3c67c019196c"), 
    // );
    $keyword_node = addLevel1($dom,$node[0],'gmd:keyword','gmx:Anchor',$keyword);
    foreach ($lib_thesaurus as $aValue) {
        foreach ($aValue as $key => $value) {
            if ($key == $keyword) {
                  addAttr($keyword_node[1],"xlink:href",$value);
             }
        }
    }
}



// templet ISO 19115 
// <gmd:descriptiveKeywords>
// <gmd:MD_Keywords>
// <gmd:thesaurusName>
// <gmd:CI_Citation>
// <gmd:linkage>
// <gmd:URL>http://gcmd.nasa.gov/Resources/valids/</gmd:URL>
// </gmd:linkage>
// </gmd:CI_Citation>
// </gmd:thesaurusName>
// <gmd:keyword>
// <gco:CharacterString>EARTH SCIENCE&gt;CRYOSPHERE&gt;SNOW/ICE&gt;ALBEDO&gt;BETA&gt;GAMMA&gt;DETAILED</gco:CharacterString>
// </gmd:keyword>
// </gmd:MD_Keywords>
// </gmd:descriptiveKeywords>


