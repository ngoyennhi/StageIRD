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
                    $newNode = new DOMNode();
                    if($content == " "){
                        $c0 = $dom->createElement($tag0);
                    } else {
                        $c0 = $dom->createElement($tag0,$content);
                    }
                    $node->appendChild($c0);
                    $newNode = $c0;
                    return $newNode;
                };

                /**
                 * function add a NODE level 1
                 */
                function addLevel1($dom,$node,$tag0,$tag1,$content){
                    $newNode0 = new DOMNode();
                    $newNode1 = new DOMNode();
                    $l1 = $dom->createElement($tag0);
                    $c1 = $dom->createElement($tag1,$content);
                    $l1->appendChild($c1);
                    $node->appendChild($l1);
                    $newNode0 = $l1;
                    $newNode1 = $c1;
                    return array($newNode0,$newNode1);
                };

                /**
                 * function add a NODE level 2
                 */
                function addLevel2($dom,$node,$tag0,$tag1,$tag2,$content){
                    $newNode0 = new DOMNode();
                    $newNode1 = new DOMNode();
                    $newNode2 = new DOMNode();
                    $l1 = $dom->createElement($tag0);
                    $l2 = $dom->createElement($tag1);
                    $c1 = $dom->createElement($tag2,$content);
                    $l2->appendChild($c1);
                    $l1->appendChild($l2);
                    $node->appendChild($l1);
                    $newNode0 =   $l1;
                    $newNode1 =   $l2;
                    $newNode2 =   $c1;
                    return array($newNode0,$newNode1,$newNode2);

                };

                /**
                 * function add a NODE level 3
                 */
                function addLevel3($dom,$node,$tag0,$tag1,$tag2,$tag3,$content){
                    $newNode0 = new DOMNode();
                    $newNode1 = new DOMNode();
                    $newNode2 = new DOMNode();
                    $newNode3 = new DOMNode();
                    $l1 = $dom->createElement($tag0);
                    $l2 = $dom->createElement($tag1);
                    $l3 = $dom->createElement($tag2);
                    $c2 = $dom->createElement($tag3,$content);
                    $l3->appendChild($c2);
                    $l2->appendChild($l3);
                    $l1->appendChild($l2);
                    $node->appendChild($l1);
                    $newNode0 = $l1;
                    $newNode1 = $l2;
                    $newNode2 = $l3;
                    $newNode3 = $c2;
                    return array($newNode0,$newNode1,$newNode2,$newNode3);
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
    addLevel1($dom,$root,'gmd:fileIdentifier','gco:CharacterString',$o_IDENTIFIER);
    /*********************************  
          Bloc: gmd:language 
          OSO :
    ********************************/
    addLevel1($dom,$root,'gmd:language','gco:CharacterString','eng');
      
    /*********************************  
          Bloc: gmd:characterSet
          OSO :
    ********************************/
    addLevel1($dom,$root,'gmd:characterSet','gmd:MD_CharacterSetCode','utf8');
            // $attr_MD_codeList = new DOMAttr(
            //     'codeList',
            //     'http://www.ngdc.noaa.gov/metadata/published/xsd/schema/resources/Codelist/gmxCodelists.xml#MD_CharacterSetCode'
            // );
            // $attr_MD_codeListValue = new DOMAttr('codeListValue', 'utf8');
            // $gmdMD_CharacterSetCode_node->setAttributeNode($attr_MD_codeList);
            // $gmdMD_CharacterSetCode_node->setAttributeNode($attr_MD_codeListValue);

    /*********************************  
          Bloc:  gmd:contact
          OSO :  PRODUCER
    ********************************/
    addLevel1($dom,$root,'gmd:contact','gco:CharacterString',$o_PRODUCER);

    /*********************************  
          Bloc:  gmd:locale
          OSO :  GEOGRAPHICAL_ZONE
    ********************************/
    $gmdLocale_node=addLevel2($dom,$root,'gmd:locale','gmd:PT_Locale','gmd:country',$o_GEOGRAPHICAL_ZONE);
    addAttr($gmdLocale_node[2],'type',$o_GEOGRAPHICAL_ZONE_att_type);
     
    /*********************************  
          Bloc:  gmd:dateStamp
          OSO :  PRODUCTION_DATE
    ********************************/
    addLevel1($dom,$root,'gmd:dateStamp','gco:DateTime',$o_PRODUCTION_DATE);
    
    /*********************************  
          Bloc:  gmd:metadataStandardName
          OSO :  TITLE
    ********************************/
    addLevel1($dom,$root,'gmd:metadataStandardName','gco:CharacterString','ISO 19115-2 Geographic Information - Metadata Part 2 Extensions for imagery and gridded data');

    /*********************************  
          Bloc:  gmd:metadataStandardVersion
          OSO :  
    ********************************/
    addLevel1($dom,$root,'gmd:metadataStandardVersion','gco:CharacterString','ISO 19115-2:2009(E)');
       
    /*********************************  
          Bloc: gmd:MD_DataIdentification
          OSO: Product_Characteristics
    ********************************/
    $gmdMD_DataIdentification_node = $dom->createElement('gmd:MD_DataIdentification');
    //----------------------------------------------------/
    //OSO: <TITLE>Produit carte d'occupation des sols</TITLE>
    //----------------------------------------------------/
    // $gmdCitationNodeArr[] is a array of a listNODE childs gmd:citation-0 gmd:CI_citation-1 gmd:title-2 gco:CharacterString-3 
    $gmdCitationNodeArr = addLevel3($dom,$gmdMD_DataIdentification_node,'gmd:citation','gmd:CI_citation',
    'gmd:title','gco:CharacterString',$o_TITLE); 
    //----------------------------------------------------/
    //OSO: <ACQUISITION_DATE>
    //----------------------------------------------------/      
    $gmdACQUISITIONDate_Node = addLevel1($dom,$gmdCitationNodeArr[1],'gmd:date','gmd:CI_Date','');
    addLevel1($dom,$gmdACQUISITIONDate_Node[1],'gmd:date','gco:DateTime',$o_ACQUISITION_DATE);
    addLevel1($dom,$gmdACQUISITIONDate_Node[1],'gmd:dateType','gmd:CI_DateTypeCode',$xml->Product_Characteristics->ACQUISITION_DATE->getName());
    //----------------------------------------------------/
    //OSO: <PRODUCTION_DATE>
    //----------------------------------------------------/
    $gmdPRODUCTIONDate_Node = addLevel1($dom,$gmdCitationNodeArr[1],'gmd:date','gmd:CI_Date','');
    addLevel1($dom,$gmdPRODUCTIONDate_Node[1],'gmd:date','gco:DateTime',$o_PRODUCTION_DATE);
    addLevel1($dom,$gmdPRODUCTIONDate_Node[1],'gmd:dateType','gmd:CI_DateTypeCode',$xml->Product_Characteristics->PRODUCTION_DATE->getName());
    //----------------------------------------------------/
    //OSO: <PRODUCT_LEVEL>
    //----------------------------------------------------/
    $gmdSeries_Node = addLevel0($dom,$gmdCitationNodeArr[1],'gmd:series','');
addLevel2($dom,$gmdSeries_Node,'gmd:CI_Series','gmd:name','gco:CharacterString',$o_PRODUCT_LEVEL);
//----------------------------------------------------/
//OSO: <AUTHORITY>
//----------------------------------------------------/
$gmdAuthority_Node = addLevel1($dom,$gmdCitationNodeArr[1],'gmd:authority','gco:CharacterString',$o_AUTHORITY);

//----------------------------------------------------/
//OSO: <PRODUCT_ID> and <PRODUCT_VERSION>
//----------------------------------------------------/
$gmdIdentifiantPRODUCT_Node = addLevel1($dom,$gmdCitationNodeArr[1],'gmd:identifier','gmd:MD_Identifier','');
addLevel1($dom,$gmdIdentifiantPRODUCT_Node[1],'gmd:code','gco:CharacterString',$o_PRODUCT_ID);
addLevel1($dom,$gmdIdentifiantPRODUCT_Node[1],'gmd:version','gco:CharacterString',$o_PRODUCT_VERSION);

//----------------------------------------------------/
//OSO: <PROJET_ID>
//----------------------------------------------------/
$gmdIdentifiantPROJET_Node = addLevel1($dom,$gmdCitationNodeArr[1],'gmd:identifier','gmd:MD_Identifier','');
addLevel1($dom,$gmdIdentifiantPROJET_Node[1],'gmd:code','gco:CharacterString',$o_PROJECT );
addLevel1($dom,$gmdIdentifiantPROJET_Node[1],'gmd:description','gco:CharacterString',$xml->Dataset_Identification->PROJECT->getName());

//----------------------------------------------------/
//OSO: <Geopositioning>
//----------------------------------------------------/
    $gmdGeographicElement_Node = addLevel1($dom,$gmdCitationNodeArr[1],'gmd:extent','gmd:geographicElement','');   
        // OSO: <Point name="upperLeft">
        addLevel1($dom,$gmdGeographicElement_Node[1],'gmd:westBoundLatitude','gco:Decimal',$contentPointListsDetail[0]);
        addLevel1($dom,$gmdGeographicElement_Node[1],'gmd:westBoundLongitude','gco:Decimal',$contentPointListsDetail[1]);
        // OSO: <Point name="upperRight">
        addLevel1($dom,$gmdGeographicElement_Node[1],'gmd:eastBoundLatitude','gco:Decimal',$contentPointListsDetail[4]);
        addLevel1($dom,$gmdGeographicElement_Node[1],'gmd:eastBoundLongitude','gco:Decimal',$contentPointListsDetail[5]);
        // OSO: <Point name="lowerRight">
        addLevel1($dom,$gmdGeographicElement_Node[1],'gmd:southBoundLatitude','gco:Decimal',$contentPointListsDetail[8]);
        addLevel1($dom,$gmdGeographicElement_Node[1],'gmd:southBoundLongitude','gco:Decimal',$contentPointListsDetail[9]);
        // OSO: <Point name="lowerLeft">
        addLevel1($dom,$gmdGeographicElement_Node[1],'gmd:northBoundLatitude','gco:Decimal',$contentPointListsDetail[12]);
        addLevel1($dom,$gmdGeographicElement_Node[1],'gmd:northBoundLongitude','gco:Decimal',$contentPointListsDetail[13]);

    // //----------------------------------------------------/
    // //gmd:descriptiveKeywords  gmd:MD_Keywords
    // //----------------------------------------------------/  
    // $gmdDescriptiveKeywords_Node = addLevel1($dom,$gmdCitationNodeArr[1],'gmd:descriptiveKeywords','gmd:MD_Keywords',''); 

$root->appendChild($gmdMD_DataIdentification_node);
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
          Bloc: gmi:platform
          OSO: PLATFORM
********************************/
$gmdPlatform_node = addLevel3($dom,$root,'gmi:platform','eos:EOS_Platform','gmi:identifier','gmd:MD_Identifier','');
addLevel1($dom,$gmdPlatform_node[3],'gmd:code','gco:CharacterString',$o_PLATFORM);

 /*********************************  
          Bloc: gmd:referenceSystemInfo
          OSO: GEO_TABLES
 ********************************/
        $gmdReferenceSystemInfo_node = addLevel3($dom,$root,'gmd:referenceSystemInfo','gmd:MD_ReferenceSystem','gmd:referenceSystemIdentifier','gmd:RS_Identifier','');
        $gmdAuthority_node = addLevel0($dom,$gmdReferenceSystemInfo_node[3],'gmd:authority','');
            // OSO <GEO_TABLES>
            addLevel2($dom,$gmdAuthority_node,'gmd:CI_Citation','gmd:title','gco:CharacterString',$o_GEO_TABLES);       
            // OSO <HORIZONTAL_CS_TYPE>
            $citationNODE =addLevel2($dom,$gmdAuthority_node,'gmd:CI_Citation','gmd:title','gco:CharacterString',$o_HORIZONTAL_CS_TYPE);    
            addLevel1($dom,$citationNODE[0],'gmd:description','gco:CharacterString','HORIZONTAL_CS_TYPE');
            // OSO <HORIZONTAL_CS_NAME>
            $citationNODE =addLevel2($dom,$gmdAuthority_node,'gmd:CI_Citation','gmd:title','gco:CharacterString',$o_HORIZONTAL_CS_NAME);    
            addLevel1($dom,$citationNODE[0],'gmd:description','gco:CharacterString','HORIZONTAL_CS_NAME');
        // OSO <HORIZONTAL_CS_CODE> 
        addLevel1($dom,$gmdReferenceSystemInfo_node[3],'gmd:code','gco:CharacterString',$o_HORIZONTAL_CS_CODE);

        //----ROOT--------ROOT--------ROOT--------ROOT----
        //appendChild $root
        $dom->appendChild($root);
        // save data
        $dom->save($xml_file_name);
        echo "$xml_file_name has been successfully created and saved";
        // }



 