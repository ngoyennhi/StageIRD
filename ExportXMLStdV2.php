<?php ini_set('display_errors', 'on'); ?>
        <?php
        include 'getStringXML.php';

        $dom = new DOMDocument();
        $dom->encoding = 'utf-8';
        $dom->xmlVersion = '1.0';
        $dom->formatOutput = true;
        $xml_file_name =
            'XML_ISO.xml';

/*********************************  
                 Bloc: Functions
********************************/
/** Inserts a new node after a given reference node. Basically it is the complement to the DOM specification's
 * insertBefore() function.
 * @param \DOMNode $newNode The node to be inserted.
 * @param \DOMNode $referenceNode The reference node after which the new node should be inserted.
 * @return \DOMNode The node that was inserted.
 */
function insertAfter(\DOMNode $newNode, \DOMNode $referenceNode)
{
  if($referenceNode->nextSibling === null) {
      return $referenceNode->parentNode->appendChild($newNode);
  } else {
      return $referenceNode->parentNode->insertBefore($newNode, $referenceNode->nextSibling);
  }
}
                /**
                 * function add a NODE level 0
                 */
                function addLevel0($dom,$node,$tag0,$content){
                    if($content == " "){
                        $c0 = $dom->createElement($tag0);
                    } else {
                        $c0 = $dom->createElement($tag0,$content);
                    }
                    $node->appendChild($c0);
                    return $node;
                };
                /**
                 * function add a NODE level 1
                 */
                function addLevel1($dom,$node,$tag0,$tag1,$content){
                    $l1 = $dom->createElement($tag0);
                    $c1 = $dom->createElement($tag1,$content);
                    $l1->appendChild($c1);
                    $node->appendChild($l1);
                    return $node;
                };

                /**
                 * function add a NODE level 2
                 */
                function addLevel2($dom,$node,$tag0,$tag1,$tag2,$content){
                    $l1 = $dom->createElement($tag0);
                    $l2 = $dom->createElement($tag1);
                    $c1 = $dom->createElement($tag2,$content);
                    $l2->appendChild($c1);
                    $l1->appendChild($l2);
                    $node->appendChild($l1);
                    return $node;
                };

                /**
                 * function add a NODE level 3
                 */
                function addLevel3($dom,$node,$tag0,$tag1,$tag2,$tag3,$content){
                    $l1 = $dom->createElement($tag0);
                    $l2 = $dom->createElement($tag1);
                    $l3 = $dom->createElement($tag2);
                    $c2 = $dom->createElement($tag3,$content);
                    $l3->appendChild($c2);
                    $l2->appendChild($l3);
                    $l1->appendChild($l2);
                    $node->appendChild($l1);
                    return $node;
                };
                /**
                 * function add Attribute for a NODE
                 */
                function addAttr($tag,$attrName,$attrString){
                    $attr = new DOMAttr ($attrName,$attrString);
                    $tag->setAttributeNode($attr);
                };   

        // // If the $xml_file_name file in existing directory already exist, delete it by unlink()
        // if (!unlink($xml_file_name)) {
        //     echo "$file_pointer cannot be deleted due to an error";
        // } else {
            
    
    /*********************************  
          gmi:MI_Metadata
          OSO - <Metadata_Identification>
     ********************************/

        // START Un premier élément'gmi:MI_Metadata'

        $root = $dom->createElement('gmi:MI_Metadata');

        //set Attributs of élément 'gmi:MI_Metadata'
        addAttr($root,'xmlns:xsi',(string)$o_Muscate_Metadata_Document_DocNamespaces_xsi);
        addAttr($root,'xsi:noNamespaceSchemaLocation',(string) $o_Muscate_Metadata_Document_xsi);
        addAttr($root,'xmlns:eos','http://earthdata.nasa.gov/schema/eos');
        addAttr($root,'xmlns:gco','http://www.isotc211.org/2005/gco');
        addAttr($root,'xmlns:gmd','http://www.isotc211.org/2005/gmd');
        addAttr($root,'xmlns:gml','http://www.opengis.net/gml/3.2');
        addAttr($root,'xmlns:gmi','http://www.isotc211.org/2005/gmi');
        addAttr($root,'xmlns:gmx','http://www.isotc211.org/2005/gmx');
        addAttr($root,'xmlns:gsr','http://www.isotc211.org/2005/gmr');
        addAttr($root,'xmlns:gss','http://www.isotc211.org/2005/gss');
        addAttr($root,'xmlns:gts','http://www.isotc211.org/2005/gts');
        addAttr($root,'xmlns:srv','http://www.isotc211.org/2005/srv');
        addAttr($root,'xmlns:swe','http://schemas.opengis.net/sweCommon/2.0/');
        addAttr($root,'xmlns:srv','http://www.isotc211.org/2005/srv');
        addAttr($root,'xmlns:xlink','http://www.w3.org/1999/xlink');
        addAttr($root,'xmlns:xs','http://www.w3.org/2001/XMLSchema');

        /* Data - NODEs and add node into its parent by appendChild */

    /*********************************  
          Bloc: gmd:fileIdentifier - 
          OSO: Dataset_Identification
    ********************************/

        //gmd:fileIdentifier
        $gmdFileIdentifier_node = $dom->createElement('gmd:fileIdentifier');
        //gmd:fileIdentifier/gco:CharacterString
        $gcoCharacterString_node = $dom->createElement(
            'gco:CharacterString',
            $o_IDENTIFIER
        );
        $gmdFileIdentifier_node->appendChild($gcoCharacterString_node);
        $root->appendChild($gmdFileIdentifier_node);

    /*********************************  
          Bloc: gmd:language 
          OSO :
    ********************************/
        //gmd:language
        $gmdLanguage_node = $dom->createElement('gmd:language');
        // gmd:language/gco:CharacterString
        $gcoCharacterString_node = $dom->createElement(
            'gco:CharacterString',
            'eng'
        );
        $gmdLanguage_node->appendChild($gcoCharacterString_node);
        $root->appendChild($gmdLanguage_node);
      
    /*********************************  
          Bloc: gmd:characterSet
          OSO :
    ********************************/
        //gmd:characterSet
        $gmdLanguage_node = $dom->createElement('gmd:characterSet');
        // gmd:characterSet/gmd:MD_CharacterSetCode
        $gmdMD_CharacterSetCode_node = $dom->createElement(
            'gmd:MD_CharacterSetCode',
            'utf8'
        );
            // $attr_MD_codeList = new DOMAttr(
            //     'codeList',
            //     'http://www.ngdc.noaa.gov/metadata/published/xsd/schema/resources/Codelist/gmxCodelists.xml#MD_CharacterSetCode'
            // );
            // $attr_MD_codeListValue = new DOMAttr('codeListValue', 'utf8');
            // $gmdMD_CharacterSetCode_node->setAttributeNode($attr_MD_codeList);
            // $gmdMD_CharacterSetCode_node->setAttributeNode($attr_MD_codeListValue);
        $gmdLanguage_node->appendChild($gmdMD_CharacterSetCode_node);
        $root->appendChild($gmdLanguage_node);

    /*********************************  
          Bloc:  gmd:contact
          OSO :  PRODUCER
    ********************************/
        $gmdContact_node = $dom->createElement('gmd:contact');
        $gcoCharacterString_node = $dom->createElement(
            'gco:CharacterString',
            $o_PRODUCER
        );
        $gmdContact_node->appendChild($gcoCharacterString_node);
        $root->appendChild($gmdContact_node);

    /*********************************  
          Bloc:  gmd:locale
          OSO :  GEOGRAPHICAL_ZONE
    ********************************/
        $gmdLocale_node = $dom->createElement('gmd:locale');
        $gmdPT_Locale_node = $dom->createElement('gmd:PT_Locale');
        $gmdPT_Locale_Country_node = $dom->createElement('gmd:country',$o_GEOGRAPHICAL_ZONE);
        $attrPT_Locale_Country_node = new DOMAttr(
            'type', $o_GEOGRAPHICAL_ZONE_att_type
        );
        $gmdPT_Locale_Country_node->setAttributeNode($attrPT_Locale_Country_node);
        $gmdPT_Locale_node->appendChild($gmdPT_Locale_Country_node);
        $gmdLocale_node->appendChild($gmdPT_Locale_node);
        $root->appendChild($gmdLocale_node);

    /*********************************  
          Bloc:  gmd:dateStamp
          OSO :  PRODUCTION_DATE
    ********************************/
        //gmd:dateStamp
        $gmdDateStamp_node = $dom->createElement('gmd:dateStamp');
        //gco:DateTime
        $gcoDateTime_node = $dom->createElement(
            'gco:DateTime',
            $o_PRODUCTION_DATE
        );
        $gmdDateStamp_node->appendChild($gcoDateTime_node);
        $root->appendChild($gmdDateStamp_node);


    /*********************************  
          Bloc:  gmd:metadataStandardName
          OSO :  TITLE
    ********************************/
        //gmd:metadataStandardName
        $gmdMetadataStandardName_node = $dom->createElement(
            'gmd:metadataStandardName',
        );
        //gco:CharacterString
        $gcoCharacterString = $dom->createElement(
            'gco:CharacterString',
            'ISO 19115-2 Geographic Information - Metadata Part 2 Extensions for imagery and gridded data'
        );
        $gmdMetadataStandardName_node->appendChild($gcoCharacterString);
        $root->appendChild($gmdMetadataStandardName_node);

    /*********************************  
          Bloc:  gmd:metadataStandardVersion
          OSO :  
    ********************************/
        //gmd:metadataStandardVersion
        $gmdMetadataStandardVersion_node = $dom->createElement(
            'gmd:metadataStandardVersion',
        );
        //gco:CharacterString
        $gcoCharacterString = $dom->createElement(
            'gco:CharacterString',
            'ISO 19115-2:2009(E)'
        );
        $gmdMetadataStandardVersion_node->appendChild($gcoCharacterString);
        $root->appendChild($gmdMetadataStandardVersion_node);
    
    /*********************************  
          Bloc: gmd:MD_Distribution
          OSO: Distributed_Product
    ********************************/
    $gmdMD_Distribution_node = $dom->createElement('gmd:MD_Distribution');
                $gmdMD_Distribution_citation_node = $dom->createElement('gmd:citation');
                $gmdMD_Distribution_citation_CI_Citation_node = $dom->createElement('gmd:CI_Citation');

                $data = array_combine($tagDetailDistributed_Product,$contentDetailDistributed_Product);
               
                foreach ($data as $key => $produit) {
                    if(!is_null($produit))
                    {   
                        $gmdMD_Format_node = $dom->createElement('gmd:MD_Format'); 

                        addLevel1($dom,$gmdMD_Format_node,'gmd:title','gco:CharacterString',$produit);

                        addLevel0($dom,$gmdMD_Format_node,'gmd:distributionFormat',strstr(trim($produit,'./.'),'.'));
                        
                        addLevel1($dom,$gmdMD_Format_node,'gmd:description','gco:CharacterString',$key);

                        $gmdMD_Distribution_citation_CI_Citation_node->appendChild($gmdMD_Format_node);
                        }
                } 
                $gmdMD_Distribution_citation_node->appendChild($gmdMD_Distribution_citation_CI_Citation_node);
                $gmdMD_Distribution_node->appendChild($gmdMD_Distribution_citation_node);
                $root->appendChild($gmdMD_Distribution_node);
    
    /*********************************  
          Bloc: gmd:MD_DataIdentification
          OSO: Product_Characteristics
    ********************************/
    $gmdMD_DataIdentification_node = $dom->createElement('gmd:MD_DataIdentification');

    $root->appendChild($gmdMD_DataIdentification_node);
    //----ROOT--------ROOT--------ROOT--------ROOT----
        //appendChild $root
        $dom->appendChild($root);
        // save data
        $dom->save($xml_file_name);
        echo "$xml_file_name has been successfully created and saved";
        // }