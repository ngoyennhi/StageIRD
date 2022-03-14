<?php ini_set('display_errors', 'on'); ?>
        <?php
        // include('getStringXML.php');
        // $xw = xmlwriter_open_memory();
        // xmlwriter_set_indent($xw, 1);
        // $res = xmlwriter_set_indent_string($xw,' ');
        // xmlwriter_start_document($xw, '1.0', 'UTF-8');

        // xmlwriter_write_comment($xw, 'ceci est la partie de xmlns - attribut de gmi:MI_Metadata');

        // // START Un premier élément'gmi:MI_Metadata'
        // xmlwriter_start_element($xw, 'gmi:MI_Metadata');

        // // Attribut 'xmlns:eos' pour élément 'gmi:MI_Metadata'
        // xmlwriter_start_attribute($xw, 'xmlns:eos');
        // xmlwriter_text($xw, 'http://earthdata.nasa.gov/schema/eos');

        // xmlwriter_start_attribute($xw, 'xmlns:gco');
        // xmlwriter_text($xw, 'http://www.isotc211.org/2005/gco');

        // xmlwriter_start_attribute($xw, 'xmlns:gmd');
        // xmlwriter_text($xw, 'http://www.isotc211.org/2005/gmd');

        // xmlwriter_start_attribute($xw, 'xmlns:gmi');
        // xmlwriter_text($xw, 'http://www.isotc211.org/2005/gmi');

        // xmlwriter_start_attribute($xw, 'xmlns:gmx');
        // xmlwriter_text($xw, 'http://www.isotc211.org/2005/gmx');

        // xmlwriter_start_attribute($xw, 'xmlns:gml');
        // xmlwriter_text($xw, 'http://www.opengis.net/gml/3.2');

        // xmlwriter_start_attribute($xw, 'xmlns:gsr');
        // xmlwriter_text($xw, 'http://www.isotc211.org/2005/gsr');

        // xmlwriter_start_attribute($xw, 'xmlns:gss');
        // xmlwriter_text($xw, 'http://www.isotc211.org/2005/gss');

        // xmlwriter_start_attribute($xw, 'xmlns:gts');
        // xmlwriter_text($xw, 'http://www.isotc211.org/2005/gts');

        // xmlwriter_start_attribute($xw, 'xmlns:srv');
        // xmlwriter_text($xw, 'http://www.isotc211.org/2005/srv');

        // xmlwriter_start_attribute($xw, 'xmlns:swe');
        // xmlwriter_text($xw, 'http://schemas.opengis.net/sweCommon/2.0/');

        // xmlwriter_start_attribute($xw, 'xmlns:xlink');
        // xmlwriter_text($xw, 'http://www.w3.org/1999/xlink');

        // xmlwriter_start_attribute($xw, 'xmlns:xs');
        // xmlwriter_text($xw, 'http://www.w3.org/2001/XMLSchema');

        // xmlwriter_start_attribute($xw, 'xmlns:xsi');
        // xmlwriter_text($xw, 'http://www.w3.org/2001/XMLSchema-instance');

        // // END Un premier élément'gmi:MI_Metadata'
        // xmlwriter_end_attribute($xw);

        // // Début d'un élément enfant gmd:fileIdentifier
        // xmlwriter_start_element($xw, 'gmd:fileIdentifier');
        // xmlwriter_start_element($xw, 'gco:CharacterString');
        // xmlwriter_text($xw, $gco_CharacterString);
        // xmlwriter_end_element($xw); // gco:CharacterString
        // xmlwriter_end_element($xw); // gmd:fileIdentifier
        // xmlwriter_end_element($xw); // gmi:MI_Metadata

        // // END XML
        // xmlwriter_end_document($xw);

        // echo xmlwriter_output_memory($xw)

        //        // TEST 02/03/22
        //         $tagLevel1 = array();
        //         $contentLevel1 = array();
        //         $tagLevel2 = array();
        //         $contentLevel2 = array();
        //         $tagLevel3 = array();
        //         $contentLevel3 = array();
        //         $tagLevel4 = array();
        //         $contentLevel4 = array();
        //         $tagLevel5 = array();
        //         $contentLevel5 = array();

        //         // $xml = simplexml_load_file($myXMLData);
        //         $xml = simplexml_load_file(
        //             'OSO_20200101_VECTOR_departement_01_V1-0_MTD_ALL.xml'
        //         );
        //         if ($xml === false) {
        //             echo 'Failed loading XML: ';
        //             foreach (libxml_get_errors() as $error) {
        //                 echo '<br>', $error->message;
        //             }
        //         } else {
        //             // print_r($xml);
        //             //Detail data line by line
        //             //echo $xml->getName() . '<br>';
        //             foreach ($xml->children() as $child) {
        //                 $tagLevel1 []= $child->getName();
        //                 $contentLevel1 []= $child;
        //                 //echo $child->getName() . ': ' . $child . '<br>';
        //                 foreach ($child->children() as $petitChild) {
        //                     $tagLevel2 []= $petitChild->getName();
        //                     $contentLevel2 []= $petitChild;
        //                     //echo $petitChild->getName() . ': ' . $petitChild . '<br>';
        //                     foreach ($petitChild->children() as $toutPetitChild) {
        //                         $tagLevel3[] = $toutPetitChild->getName();
        //                         $contentLevel3[] = $toutPetitChild;
        //                         //echo $toutPetitChild->getName() .': ' . $toutPetitChild .'<br>';
        //                         foreach (
        //                             $toutPetitChild->children()
        //                             as $superPetitChild
        //                         ) {
        //                             $tagLevel4[] = $superPetitChild->getName();
        //                             $contentLevel4 []= $superPetitChild;
        //                             //echo $superPetitChild->getName() .': ' . $superPetitChild . '<br>';
        //                             foreach (
        //                                 $superPetitChild->children()
        //                                 as $supertoutPetitChild
        //                             ) {
        //                                 $tagLevel5[] = $supertoutPetitChild->getName();
        //                                 $contentLevel5[] = $supertoutPetitChild;
        //                                 //echo $supertoutPetitChild->getName() .': ' .$supertoutPetitChild .'<br>';
        //                             }
        //                         }
        //                     }
        //                 }
        //             }
        //         }

        // var_dump( $xml);

        //     $matches = preg_match("/<IDENTIFIER.*>(.*)<\\/IDENTIFIER>/", $xml);
        //     var_dump($matches[1]);// your data between <text> and </text>
        //     echo "tito";

        //     $identifiant = $xml ->xpath('/Dataset_Identification/IDENTIFIER');
        //     $fileIdentifier_CharacterString = $identifiant[0];

        // $xml = new SimpleXMLElement($myXMLData) or die('Error: Cannot create xml data object');

        // // echo une liste
        // while(list(,$node) = each($xml)){
        //     echo '<gmd:fileIdentifier>'.'<br>';
        //     echo '<gco:CharacterString>'.$node.'</gco:CharacterString>'.'<br>';
        //     echo '</gmd:fileIdentifier>'.'<br>';
        // }

        
        //------------------------------------------------------------
        // $xml = simplexml_load_file(
        //     'OSO_20200101_VECTOR_departement_01_V1-0_MTD_ALL.xml'
        // );
        // if ($xml === false) {
        //     echo 'Failed loading XML: ';
        //     foreach (libxml_get_errors() as $error) {
        //         echo '<br>', $error->message;
        //     }
        // } else {
        // // Get data form XMl 

        // //    $METADATA_FORMAT = $xml->Metadata_Identification->METADATA_FORMAT;
        // //    $METADATA_FORMAT_version = $xml->Metadata_Identification->METADATA_FORMAT->attributes()->version;

        // }


        //------------------------------------------------------------

        
        // //get content dans CDATA 
        // $doc = new DOMDocument();
        // $doc->load('test.xml');
        // $destinations = $doc->getElementsByTagName("Destination");
        // foreach ($destinations as $destination) {
        //     foreach($destination->childNodes as $child) {
        //         if ($child->nodeType == XML_CDATA_SECTION_NODE) {
        //             echo $child->textContent . "<br/>";
        //         }
        //     }
        // }
 //------------------------------------------------------------

        // function dom2array($node) {
        //     $res = array();
        //     print $node->nodeType.'<br/>';
        //     if($node->nodeType == XML_TEXT_NODE){
        //         $res = $node->nodeValue;
        //     }
        //     else{
        //         if($node->hasAttributes()){
        //             $attributes = $node->attributes;
        //             if(!is_null($attributes)){
        //                 $res['@attributes'] = array();
        //                 foreach ($attributes as $index=>$attr) {
        //                     $res['@attributes'][$attr->name] = $attr->value;
        //                 }
        //             }
        //         }
        //         if($node->hasChildNodes()){
        //             $children = $node->childNodes;
        //             for($i=0;$i<$children->length;$i++){
        //                 $child = $children->item($i);
        //                 $res[$child->nodeName] = dom2array($child);
        //             }
        //         }
        //     }
        //     return $res;
        //   }
//------------------------------------------------------------

// /**
//   * convert xml string to php array - useful to get a serializable value
//   *
//   * @param string $xmlstr
//   * @return array
//   *
//   * @author Adrien aka Gaarf & contributors
//   * @see http://gaarf.info/2009/08/13/xml-string-to-php-array/
// */
// function xmlstr_to_array($xmlstr) {
//   $doc = new DOMDocument();
//   $doc->loadXML($xmlstr);
//   $root = $doc->documentElement;
//   $output = domnode_to_array($root);
//   $output['@root'] = $root->tagName;
//   return $output;
// }
// function domnode_to_array($node) {
//   $output = array();
//   switch ($node->nodeType) {
//     case XML_CDATA_SECTION_NODE:
//     case XML_TEXT_NODE:
//       $output = trim($node->textContent);
//     break;
//     case XML_ELEMENT_NODE:
//       for ($i=0, $m=$node->childNodes->length; $i<$m; $i++) {
//         $child = $node->childNodes->item($i);
//         $v = domnode_to_array($child);
//         if(isset($child->tagName)) {
//           $t = $child->tagName;
//           if(!isset($output[$t])) {
//             $output[$t] = array();
//           }
//           $output[$t][] = $v;
//         }
//         elseif($v || $v === '0') {
//           $output = (string) $v;
//         }
//       }
//       if($node->attributes->length && !is_array($output)) { //Has attributes but isn't an array
//         $output = array('@content'=>$output); //Change output into an array.
//       }
//       if(is_array($output)) {
//         if($node->attributes->length) {
//           $a = array();
//           foreach($node->attributes as $attrName => $attrNode) {
//             $a[$attrName] = (string) $attrNode->value;
//           }
//           $output['@attributes'] = $a;
//         }
//         foreach ($output as $t => $v) {
//           if(is_array($v) && count($v)==1 && $t!='@attributes') {
//             $output[$t] = $v[0];
//           }
//         }
//       }
//     break;
//   }
//   return $output;
// }

//------------------------------------------------------------


// function XMLtoArray($xml) {
//     $previous_value = libxml_use_internal_errors(true);
//     $dom = new DOMDocument('1.0', 'UTF-8');
//     $dom->preserveWhiteSpace = false; 
//     $dom->loadXml($xml);
//     libxml_use_internal_errors($previous_value);
//     if (libxml_get_errors()) {
//         return [];
//     }
//     return DOMtoArray($dom);
// }

// function DOMtoArray($root) {
//     $result = array();

//     if ($root->hasAttributes()) {
//         $attrs = $root->attributes;
//         foreach ($attrs as $attr) {
//             $result['@attributes'][$attr->name] = $attr->value;
//         }
//     }

//     if ($root->hasChildNodes()) {
//         $children = $root->childNodes;
//         if ($children->length == 1) {
//             $child = $children->item(0);
//             if (in_array($child->nodeType,[XML_TEXT_NODE,XML_CDATA_SECTION_NODE])) {
//                 $result['_value'] = $child->nodeValue;
//                 return count($result) == 1
//                     ? $result['_value']
//                     : $result;
//             }

//         }
//         $groups = array();
//         foreach ($children as $child) {
//             if (!isset($result[$child->nodeName])) {
//                 $result[$child->nodeName] = DOMtoArray($child);
//             } else {
//                 if (!isset($groups[$child->nodeName])) {
//                     $result[$child->nodeName] = array($result[$child->nodeName]);
//                     $groups[$child->nodeName] = 1;
//                 }
//                 $result[$child->nodeName][] = DOMtoArray($child);
//             }
//         }
//     }
//     return $result;
// }

// $xml = '
//     <aaaa Version="1.0">
//        <bbb>
//          <cccc>
//            <dddd id="123" />
//            <eeee name="john" age="24" />
//            <ffff type="employee">Supervisor</ffff>
//          </cccc>
//        </bbb>
//     </aaaa>
// ';
// print_r(XMLtoArray($xml));

//------------------------------------------------------------

// class XmlElement {
//     var $name;
//     var $attributes;
//     var $content;
//     var $children;
//   };
  
//   function xml_to_object($xml) {
//     $parser = xml_parser_create();
//     xml_parser_set_option($parser, XML_OPTION_CASE_FOLDING, 0);
//     xml_parser_set_option($parser, XML_OPTION_SKIP_WHITE, 1);
//     xml_parse_into_struct($parser, $xml, $tags);
//     xml_parser_free($parser);
  
//     $elements = array();  // the currently filling [child] XmlElement array
//     $stack = array();
//     foreach ($tags as $tag) {
//       $index = count($elements);
//       if ($tag['type'] == "complete" || $tag['type'] == "open") {
//         $elements[$index] = new XmlElement;
//         $elements[$index]->name = $tag['tag'];
//         $elements[$index]->attributes = $tag['attributes'];
//         $elements[$index]->content = $tag['value'];
//         if ($tag['type'] == "open") {  // push
//           $elements[$index]->children = array();
//           $stack[count($stack)] = &$elements;
//           $elements = &$elements[$index]->children;
//         }
//       }
//       if ($tag['type'] == "close") {  // pop
//         $elements = &$stack[count($stack) - 1];
//         unset($stack[count($stack) - 1]);
//       }
//     }
//     return $elements;  // the single top-level element
//   }
// $xml = simplexml_load_file('OSO_20200101_VECTOR_departement_01_V1-0_MTD_ALL.xml');
// print_r($xml);

 // TEST 02/03/22
                $tagLevel1 = array();
                $contentLevel1 = array();
                $tagLevel2 = array();
                $contentLevel2 = array();
                $tagLevel3 = array();
                $contentLevel3 = array();
                $tagLevel4 = array();
                $contentLevel4 = array();
                $tagLevel5 = array();
                $contentLevel5 = array();


                //Get all informations of Distributed_Product ( from XML orifinal)
                //Step read XMLoriginal
                $tagLevel1 = array();
                $contentLevel1 = array();
                // $xml = simplexml_load_file($myXMLData);
                $xml = simplexml_load_file(
                    'OSO_20200101_RASTER_V1-0_MTD_ALL.xml'
                );

                $o_GEOGRAPHICAL_ZONE = $xml->Dataset_Identification->GEOGRAPHICAL_ZONE->__toString();
                $o_GEOGRAPHICAL_ZONE_att_type = $xml->Dataset_Identification->GEOGRAPHICAL_ZONE
                    ->attributes()
                    ->type->__toString();
                    

                foreach ($xml->xpath('//Distributed_Product') as $distributedProducts) {
                    $distributedProducts->getName();
                    foreach ($distributedProducts->children() as $distributedProduct){
                        $tagLevel1[]= $distributedProduct->getName();
                        $contentLevel1[] = $distributedProduct->__toString();
                        echo $distributedProduct->getName(), " : ", $distributedProduct->__toString(), PHP_EOL;   
                    }   
                }


               

                // if ($xml === false) {
                //     echo 'Failed loading XML: ';
                //     foreach (libxml_get_errors() as $error) {
                //         echo '<br>', $error->message;
                //     }
                // } else {
                //     // print_r($xml);
                //     //Detail data line by line
                //     echo $xml->getName() . '<br>';
                //     foreach ($xml->children() as $child) {
                //         //$tagLevel1 []= $child->getName();
                //         //$contentLevel1 []= $child;
                //         echo $child->getName() . ': ' . $child . '<br>';
                //         foreach ($child->children() as $petitChild) {
                //             //$tagLevel2 []= $petitChild->getName();
                //             //$contentLevel2 []= $petitChild;
                //             echo $petitChild->getName() . ': ' . $petitChild . '<br>';
                //             foreach ($petitChild->children() as $toutPetitChild) {
                //                 //$tagLevel3[] = $toutPetitChild->getName();
                //                 //$contentLevel3[] = $toutPetitChild;
                //                 echo $toutPetitChild->getName() .': ' . $toutPetitChild .'<br>';
                //                 foreach (
                //                     $toutPetitChild->children()
                //                     as $superPetitChild
                //                 ) {
                //                     //$tagLevel4[] = $superPetitChild->getName();
                //                     //$contentLevel4 []= $superPetitChild;
                //                     echo $superPetitChild->getName() .': ' . $superPetitChild . '<br>';
                //                     foreach (
                //                         $superPetitChild->children()
                //                         as $supertoutPetitChild
                //                     ) {
                //                         //$tagLevel5[] = $supertoutPetitChild->getName();
                //                         //$contentLevel5[] = $supertoutPetitChild;
                //                         echo $supertoutPetitChild->getName() .': ' .$supertoutPetitChild .'<br>';
                //                     }
                //                 }
                //             }
                //         }
                //     }
                // }

?>
