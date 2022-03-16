<?php ini_set('display_errors', 'on'); ?>
<?php
        $xml = simplexml_load_file(
            //'OSO_20200101_VECTOR_departement_01_V1-0_MTD_ALL.xml'
            'OSO_20200101_RASTER_V1-0_MTD_ALL.xml'
        );
        if ($xml === false) {
            echo 'Failed loading XML: ';
            foreach (libxml_get_errors() as $error) {
                echo '<br>', $error->message;
            }
        } 
        else {
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
            $o_METADATA_FORMAT_att_version = $xml->Metadata_Identification->METADATA_FORMAT
                ->attributes()
                ->version->__toString();
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
            //<Distributed_Product>
            // $o_QUICKLOOK = $xml->Product_Organisation->Distributed_Product->QUICKLOOK->__toString();
            // $o_THUMBNAIL = $xml->Product_Organisation->Distributed_Product->THUMBNAIL->__toString();
            // $o_PYRAMID = $xml->Product_Organisation->Distributed_Product->PYRAMID->__toString();
            // $o_ARCHIVE = $xml->Product_Organisation->Distributed_Product->ARCHIVE->__toString();
            // $o_EXPERTISE = $xml->Product_Organisation->Distributed_Product->EXPERTISE->__toString();
            // $o_PUBLIC_METADATA = $xml->Product_Organisation->Distributed_Product->PUBLIC_METADATA->__toString();
           
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
            // //  Point upperLeft 0
            // $o_Global_Geopositioning_att_Point_0 = $xml->Geoposition_Informations->Geopositioning->Global_Geopositioning->Point[0]
            //     ->attributes()
            //     ->name->__toString();
            // $o_Global_Geopositioning_att_Point_0_LAT = $xml->Geoposition_Informations->Geopositioning->Global_Geopositioning->Point[0]->LAT->__toString();
            // $o_Global_Geopositioning_att_Point_0_LON = $xml->Geoposition_Informations->Geopositioning->Global_Geopositioning->Point[0]->LON->__toString();
            // $o_Global_Geopositioning_att_Point_0_X = $xml->Geoposition_Informations->Geopositioning->Global_Geopositioning->Point[0]->X->__toString();
            // $o_Global_Geopositioning_att_Point_0_Y = $xml->Geoposition_Informations->Geopositioning->Global_Geopositioning->Point[0]->Y->__toString();
            // //  Point upperRight 1
            // $o_Global_Geopositioning_att_Point_1 = $xml->Geoposition_Informations->Geopositioning->Global_Geopositioning->Point[1]
            //     ->attributes()
            //     ->name->__toString();
            // $o_Global_Geopositioning_att_Point_1_LAT = $xml->Geoposition_Informations->Geopositioning->Global_Geopositioning->Point[1]->LAT->__toString();
            // $o_Global_Geopositioning_att_Point_1_LON = $xml->Geoposition_Informations->Geopositioning->Global_Geopositioning->Point[1]->LON->__toString();
            // $o_Global_Geopositioning_att_Point_1_X = $xml->Geoposition_Informations->Geopositioning->Global_Geopositioning->Point[1]->X->__toString();
            // $o_Global_Geopositioning_att_Point_1_Y = $xml->Geoposition_Informations->Geopositioning->Global_Geopositioning->Point[1]->Y->__toString();
            // //  Point lowerRight 2
            // $o_Global_Geopositioning_att_Point_2 = $xml->Geoposition_Informations->Geopositioning->Global_Geopositioning->Point[2]
            //     ->attributes()
            //     ->name->__toString();
            // $o_Global_Geopositioning_att_Point_2_LAT = $xml->Geoposition_Informations->Geopositioning->Global_Geopositioning->Point[2]->LAT->__toString();
            // $o_Global_Geopositioning_att_Point_2_LON = $xml->Geoposition_Informations->Geopositioning->Global_Geopositioning->Point[2]->LON->__toString();
            // $o_Global_Geopositioning_att_Point_2_X = $xml->Geoposition_Informations->Geopositioning->Global_Geopositioning->Point[2]->X->__toString();
            // $o_Global_Geopositioning_att_Point_2_Y = $xml->Geoposition_Informations->Geopositioning->Global_Geopositioning->Point[2]->Y->__toString();
            // //  Point lowerLeft 3
            // $o_Global_Geopositioning_att_Point_3 = $xml->Geoposition_Informations->Geopositioning->Global_Geopositioning->Point[3]
            //     ->attributes()
            //     ->name->__toString();
            // $o_Global_Geopositioning_att_Point_3_LAT = $xml->Geoposition_Informations->Geopositioning->Global_Geopositioning->Point[3]->LAT->__toString();
            // $o_Global_Geopositioning_att_Point_3_LON = $xml->Geoposition_Informations->Geopositioning->Global_Geopositioning->Point[3]->LON->__toString();
            // $o_Global_Geopositioning_att_Point_3_X = $xml->Geoposition_Informations->Geopositioning->Global_Geopositioning->Point[3]->X->__toString();
            // $o_Global_Geopositioning_att_Point_3_Y = $xml->Geoposition_Informations->Geopositioning->Global_Geopositioning->Point[3]->Y->__toString();
            // //  Point center 4
            // $o_Global_Geopositioning_att_Point_4 = $xml->Geoposition_Informations->Geopositioning->Global_Geopositioning->Point[4]
            //     ->attributes()
            //     ->name->__toString();
            // $o_Global_Geopositioning_att_Point_4_LAT = $xml->Geoposition_Informations->Geopositioning->Global_Geopositioning->Point[4]->LAT->__toString();
            // $o_Global_Geopositioning_att_Point_4_LON = $xml->Geoposition_Informations->Geopositioning->Global_Geopositioning->Point[4]->LON->__toString();
            // $o_Global_Geopositioning_att_Point_4_X = $xml->Geoposition_Informations->Geopositioning->Global_Geopositioning->Point[4]->X->__toString();
            // $o_Global_Geopositioning_att_Point_4_Y = $xml->Geoposition_Informations->Geopositioning->Global_Geopositioning->Point[4]->Y->__toString();
            
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