<?php ini_set('display_errors', 'on'); 
$arrSaisi = filter_input(INPUT_POST,'saisie',FILTER_DEFAULT,FILTER_REQUIRE_ARRAY);
// Traitement du formulaire
// if boutton OK appliqué, on commence le traitement
if (isset($arrSaisi['ok'])) {
    include('lib_thesaurus.php');
    //libxml_disable_entity_loader(false); 
    include('c_fonction.php');   
?>
<?php
$files = glob("../data/*xml");

if(empty($files)){
    echo("Your folder is empty.");
    echo("<meta http-equiv='refresh' content='1; url=../index.php?loc=home' />");
}
else {
 if (is_array($files)) {
    foreach($files as $filename) {
        $o_XML_filename = trim($filename,'data/.');
        $xml_file_name = before('.',$o_XML_filename).'_ISO.xml';
        //var_dump($xml_file_name);
        $path = '../results/'.$xml_file_name;
        if (file_exists($path)) {
            unlink($path);
        } 
         
        $xml = simplexml_load_file($filename);

        //-------------------------------------
        // and proceed with get String form XML
        //-------------------------------------
        {
            /*Get data form XMl*/

            // Muscate_Metadata_Document attributes
            $o_Muscate_Metadata_Document = $xml->getName();
            // xmlns:xsi
            $o_Muscate_Metadata_Document_DocNamespaces_xsi = $xml->getDocNamespaces(
                1
            );
            $o_Muscate_Metadata_Document_DocNamespaces_xsi =
                $o_Muscate_Metadata_Document_DocNamespaces_xsi['xsi'];
            // xsi:noNamespaceSchemaLocation
            $o_Muscate_Metadata_Document_xsi = $xml
                ->attributes('xsi', true)
                ->noNamespaceSchemaLocation->__toString();
            /*
            Bloc: <Metadata_Identification>
            */
            // METADATA_FORMAT attributes
            $o_METADATA_FORMAT_att_version = $xml->Metadata_Identification->METADATA_FORMAT->attributes()->version->__toString();
            $o_METADATA_FORMAT_String = $xml->Metadata_Identification->METADATA_FORMAT->__toString();
            // METADATA_PROFILE
            $o_METADATA_PROFILE_String = $xml->Metadata_Identification->METADATA_PROFILE->__toString();
            // METADATA_INFORMATION
            $o_METADATA_INFORMATION_String = $xml->Metadata_Identification->METADATA_INFORMATION->__toString();

            /*
            Bloc: <Dataset_Identification>
            */
            $o_IDENTIFIER = $xml->Dataset_Identification->IDENTIFIER->__toString();
            $o_AUTHORITY = $xml->Dataset_Identification->AUTHORITY->__toString();
            $o_PRODUCER = $xml->Dataset_Identification->PRODUCER->__toString();
            $o_PROJECT = $xml->Dataset_Identification->PROJECT->__toString();
            $o_GEOGRAPHICAL_ZONE = $xml->Dataset_Identification->GEOGRAPHICAL_ZONE->__toString();
            $o_GEOGRAPHICAL_ZONE_att_type = $xml->Dataset_Identification->GEOGRAPHICAL_ZONE
                ->attributes()
                ->type->__toString();
            
            $o_TITLE = $xml->Dataset_Identification->TITLE->__toString();
            $o_DESCRIPTION =
                '<![CDATA[' .
                $xml->Dataset_Identification->DESCRIPTION->__toString() .
                ']]>'; //"<![CDATA[".$o_DESCRIPTION."]]>"

            /*
            Bloc: <Product_Characteristics>
            */
            $o_PRODUCT_ID = $xml->Product_Characteristics->PRODUCT_ID->__toString();
            $o_ACQUISITION_DATE = $xml->Product_Characteristics->ACQUISITION_DATE->__toString();
            $o_PRODUCTION_DATE = $xml->Product_Characteristics->PRODUCTION_DATE->__toString();
            $o_PRODUCT_VERSION = $xml->Product_Characteristics->PRODUCT_VERSION->__toString();
            $o_PRODUCT_LEVEL = $xml->Product_Characteristics->PRODUCT_LEVEL->__toString();
            $o_PLATFORM = $xml->Product_Characteristics->PLATFORM->__toString();
            //<UTC_Acquisition_Range>
            $o_UTC_Acquisition_Range_MEAN = $xml->Product_Characteristics->UTC_Acquisition_Range->MEAN->__toString();
            $o_UTC_Acquisition_Range_DATE_PRECISION = $xml->Product_Characteristics->UTC_Acquisition_Range->DATE_PRECISION->__toString();
            $o_UTC_Acquisition_Range_att_DATE_PRECISION = $xml->Product_Characteristics->UTC_Acquisition_Range->DATE_PRECISION
                ->attributes()
                ->unit->__toString();
            //<Band_Global_List>
            $o_Band_Global_List_att_count = $xml->Product_Characteristics->Band_Global_List
                ->attributes()
                ->count->__toString();
            $o_Band_Global_List_BAND_ID = $xml->Product_Characteristics->Band_Global_List->BAND_ID->__toString();
            //<Band_Group_List>
            $o_Band_Group_List_Group_att_group_id = $xml->Product_Characteristics->Band_Group_List->Group
                ->attributes()
                ->group_id->__toString();
            $o_Band_Group_List_Group_Band_List_att_count = $xml->Product_Characteristics->Band_Group_List->Group->Band_List
                ->attributes()
                ->count->__toString();
            $o_Band_Group_List_Group_Band_List_BAND_ID = $xml->Product_Characteristics->Band_Group_List->Group->Band_List->BAND_ID->__toString();

            /*
            Bloc: <Product_Organisation>
            */
            $tagDistributed_Product = array();
            $attDistributed_Product = array();
            $tagDetailDistributed_Product = array();
            $contentDetailDistributed_Product = array();
            $typeProduit = array();
            foreach ($xml->xpath('//Product_Organisation') as $distributed_Product) {
                $distributed_Product->getName();
                //echo " Block : ", $distributed_Product->getName(), '<br>',PHP_EOL;
                // count number of classe to make sure we have the classes or not
               if($distributed_Product->count()>0){
                   foreach ($distributed_Product->children() as $produit){
                        $tagDistributed_Product[]= $produit->getName();
                        //echo $produit->getName(), '<br>',PHP_EOL;   

                        foreach ($produit->children() as $detailDistributed_Product){
                        $tagDetailDistributed_Product[]= $detailDistributed_Product->getName();
                        $contentDetailDistributed_Product[] = $detailDistributed_Product->__toString();
                        //echo $detailDistributed_Product->getName(), " : ",$detailDistributed_Product->__toString(),'<br>',PHP_EOL;   
                        }   
                    }
                }
            }
            // get type of produits
            foreach ($contentDetailDistributed_Product as $typeProduits) {
            // trim()
            $typeProduit = strstr(trim($typeProduits,'./.'),'.'); 
            //echo $typeProduit,'<br>',PHP_EOL;   
            }

            /*
            Bloc: <Geoposition_Informations>
            */
            //<Coordinate_Reference_System>
            $o_GEO_TABLES = $xml->Geoposition_Informations->Coordinate_Reference_System->GEO_TABLES->__toString();

            // <Coordinate_Reference_System> -> <Horizontal_Coordinate_System>
            $o_HORIZONTAL_CS_TYPE = $xml->Geoposition_Informations->Coordinate_Reference_System->Horizontal_Coordinate_System->HORIZONTAL_CS_TYPE->__toString();
            $o_HORIZONTAL_CS_NAME = $xml->Geoposition_Informations->Coordinate_Reference_System->Horizontal_Coordinate_System->HORIZONTAL_CS_NAME->__toString();
            $o_HORIZONTAL_CS_CODE = $xml->Geoposition_Informations->Coordinate_Reference_System->Horizontal_Coordinate_System->HORIZONTAL_CS_CODE->__toString();

            //<Raster_CS>
            $o_RASTER_CS_TYPE = $xml->Geoposition_Informations->Raster_CS->RASTER_CS_TYPE->__toString();
            $o_RASTER_CS_PIXEL_ORIGIN = $xml->Geoposition_Informations->Raster_CS->PIXEL_ORIGIN->__toString();

            //<Metadata_CS>
            $o_METADATA_CS_TYPE = $xml->Geoposition_Informations->Metadata_CS->METADATA_CS_TYPE->__toString();
            $o_METADATA_CS_PIXEL_ORIGIN = $xml->Geoposition_Informations->Metadata_CS->PIXEL_ORIGIN->__toString();

            //<Geopositioning>
            // <Geopositioning> -> <Global_Geopositioning>
            $tagPointLists = array();
            $attExtentPoints= array();
            $tagPointListsDetail = array();
            $contentPointListsDetail = array();
            foreach ($xml->xpath('//Global_Geopositioning') as $extentPoints) {
                $extentPoints->getName();
                //echo " Extent : ", $extentPoints->getName() , '<br>',PHP_EOL;   
                // count number of Point to make sure we have the Points or not
               if($extentPoints->count()>0){
                   //Position of points 
                   foreach ($extentPoints->children() as $extentPoint){
                    $tagPointLists[]= $extentPoint->getName();
                    $attExtentPoints[]= $extentPoint->attributes()->name->__toString();
                   //echo $extentPoint->getName(), " : ",$extentPoint->attributes()->name->__toString(), '<br>',PHP_EOL;   
                        //LON LAT X Y
                        foreach ($extentPoint->children() as $extentPointDetail){
                            $tagPointListsDetail[]= $extentPointDetail->getName();
                            $contentPointListsDetail[] = $extentPointDetail->__toString();
                            //echo $extentPointDetail->getName(), " : ",$extentPointDetail->__toString(),'<br>',PHP_EOL;   
                        }   
                    }
                }
            }

            /*
            Bloc:  <Statistic_Informations>
            */
            //Global_Statistic
            $o_KAPPA = $xml->Statistic_Informations->Global_Statistic->KAPPA;
  
            $o_OA = $xml->Statistic_Informations->Global_Statistic->OA;
   
            //Statistic_List
            //$o_Statistic_List = $xml->Statistic_Informations->Statistic_List;
            $tagClasseLists = array();
            $attStatisticClasses= array();
            $tagClasseListsDetail = array();
            $contentClasseListsDetail = array();
            foreach ($xml->xpath('//Statistic_List') as $statisticClasses) {
                $statisticClasses->getName();
                //echo " Block : ", $statisticClasses->getName();
                // count number of classe to make sure we have the classes or not
               if($statisticClasses->count()>0){
                   foreach ($statisticClasses->children() as $statisticClasse){
                    $tagClasseLists[]= $statisticClasse->getName();
                    $attStatisticClasses[]= $statisticClasse->attributes()->classe->__toString();
                    //echo $statisticClasse->getName(), " : ", $statisticClasse->attributes()->classe->__toString(), '<br>',PHP_EOL;   
                    
                    foreach ($statisticClasse->children() as $statisticClasseDetail){
                        $tagClasseListsDetail[]= $statisticClasseDetail->getName();
                        $contentClasseListsDetail[] = $statisticClasseDetail->__toString();
                        //echo $statisticClasseDetail->getName(), " : ",$statisticClasseDetail->__toString(),'<br>',PHP_EOL;   
                    }   
                   }
                }
            }
        }
        //-------------------------------------
        // and proceed with exporter XML ISO 
        //-------------------------------------
        {
            $dom = new DOMDocument();
            $dom->encoding = 'utf-8';
            $dom->xmlVersion = '1.0';
            $dom->formatOutput = true;
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
                $gmdDescriptiveKeywords_node = addLevel1($dom,$gmdCitationNodeArr[1],'gmd:descriptiveKeywords','gmd:MD_Keywords','');

                $keyword_Platform ='Sentinel - 2';
                $keyword_Theme = 'Land cover';
                $keyword_Theme_2 = 'Land cover classification';

                addKeyword($dom,$gmdDescriptiveKeywords_node,$keyword_Theme_2,$lib_thesaurus);
                addKeyword($dom,$gmdDescriptiveKeywords_node,$keyword_Theme,$lib_thesaurus);
                addKeyword($dom,$gmdDescriptiveKeywords_node,$keyword_Platform,$lib_thesaurus);
            
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
                    $dom->save("../results/".$xml_file_name);
                    echo "$xml_file_name has been successfully created and saved"."<br>";
                };

    }// end foreach
}// end if 

}// end if empty

}
?>
<!--Rediriger sur la page précédente -->
<meta http-equiv="refresh" content="1; url=../index.php?loc=fini" />
