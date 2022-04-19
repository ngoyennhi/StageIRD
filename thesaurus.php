<?php
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
function get_url($line){
    $title_thesaurus = before(';',$line);
    //cut title of thesaurus, get url 
    trim($line,$title_thesaurus.';');

};
function get_url_list($keyword){
//find all url by keywords
$url_thesaurus_arr[]= get_url(preg_grep($keyword, file('lib_thesaurus.txt')));
return $url_thesaurus_arr;
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


