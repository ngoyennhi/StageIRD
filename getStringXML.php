<?php ini_set('display_errors', 'on'); ?>
        <?php
        $xml = simplexml_load_file(
            'OSO_20200101_VECTOR_departement_01_V1-0_MTD_ALL.xml'
        );
        if ($xml === false) {
            echo 'Failed loading XML: ';
            foreach (libxml_get_errors() as $error) {
                echo '<br>', $error->message;
            }
        } else {
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
            $o_QUICKLOOK = $xml->Product_Organisation->Distributed_Product->QUICKLOOK->__toString();
            $o_THUMBNAIL = $xml->Product_Organisation->Distributed_Product->THUMBNAIL->__toString();
            $o_PYRAMID = $xml->Product_Organisation->Distributed_Product->PYRAMID->__toString();
            $o_ARCHIVE = $xml->Product_Organisation->Distributed_Product->ARCHIVE->__toString();
            $o_EXPERTISE = $xml->Product_Organisation->Distributed_Product->EXPERTISE->__toString();
            $o_PUBLIC_METADATA = $xml->Product_Organisation->Distributed_Product->PUBLIC_METADATA->__toString();

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
            //  Point upperLeft 0
            $o_Global_Geopositioning_att_Point_0 = $xml->Geoposition_Informations->Geopositioning->Global_Geopositioning->Point[0]
                ->attributes()
                ->name->__toString();
            $o_Global_Geopositioning_att_Point_0_LAT = $xml->Geoposition_Informations->Geopositioning->Global_Geopositioning->Point[0]->LAT->__toString();
            $o_Global_Geopositioning_att_Point_0_LON = $xml->Geoposition_Informations->Geopositioning->Global_Geopositioning->Point[0]->LON->__toString();
            $o_Global_Geopositioning_att_Point_0_X = $xml->Geoposition_Informations->Geopositioning->Global_Geopositioning->Point[0]->X->__toString();
            $o_Global_Geopositioning_att_Point_0_Y = $xml->Geoposition_Informations->Geopositioning->Global_Geopositioning->Point[0]->Y->__toString();
            //  Point upperRight 1
            $o_Global_Geopositioning_att_Point_1 = $xml->Geoposition_Informations->Geopositioning->Global_Geopositioning->Point[1]
                ->attributes()
                ->name->__toString();
            $o_Global_Geopositioning_att_Point_1_LAT = $xml->Geoposition_Informations->Geopositioning->Global_Geopositioning->Point[1]->LAT->__toString();
            $o_Global_Geopositioning_att_Point_1_LON = $xml->Geoposition_Informations->Geopositioning->Global_Geopositioning->Point[1]->LON->__toString();
            $o_Global_Geopositioning_att_Point_1_X = $xml->Geoposition_Informations->Geopositioning->Global_Geopositioning->Point[1]->X->__toString();
            $o_Global_Geopositioning_att_Point_1_Y = $xml->Geoposition_Informations->Geopositioning->Global_Geopositioning->Point[1]->Y->__toString();
            //  Point lowerRight 2
            $o_Global_Geopositioning_att_Point_2 = $xml->Geoposition_Informations->Geopositioning->Global_Geopositioning->Point[2]
                ->attributes()
                ->name->__toString();
            $o_Global_Geopositioning_att_Point_2_LAT = $xml->Geoposition_Informations->Geopositioning->Global_Geopositioning->Point[2]->LAT->__toString();
            $o_Global_Geopositioning_att_Point_2_LON = $xml->Geoposition_Informations->Geopositioning->Global_Geopositioning->Point[2]->LON->__toString();
            $o_Global_Geopositioning_att_Point_2_X = $xml->Geoposition_Informations->Geopositioning->Global_Geopositioning->Point[2]->X->__toString();
            $o_Global_Geopositioning_att_Point_2_Y = $xml->Geoposition_Informations->Geopositioning->Global_Geopositioning->Point[2]->Y->__toString();
            //  Point lowerLeft 3
            $o_Global_Geopositioning_att_Point_3 = $xml->Geoposition_Informations->Geopositioning->Global_Geopositioning->Point[3]
                ->attributes()
                ->name->__toString();
            $o_Global_Geopositioning_att_Point_3_LAT = $xml->Geoposition_Informations->Geopositioning->Global_Geopositioning->Point[3]->LAT->__toString();
            $o_Global_Geopositioning_att_Point_3_LON = $xml->Geoposition_Informations->Geopositioning->Global_Geopositioning->Point[3]->LON->__toString();
            $o_Global_Geopositioning_att_Point_3_X = $xml->Geoposition_Informations->Geopositioning->Global_Geopositioning->Point[3]->X->__toString();
            $o_Global_Geopositioning_att_Point_3_Y = $xml->Geoposition_Informations->Geopositioning->Global_Geopositioning->Point[3]->Y->__toString();
            //  Point center 4
            $o_Global_Geopositioning_att_Point_4 = $xml->Geoposition_Informations->Geopositioning->Global_Geopositioning->Point[4]
                ->attributes()
                ->name->__toString();
            $o_Global_Geopositioning_att_Point_4_LAT = $xml->Geoposition_Informations->Geopositioning->Global_Geopositioning->Point[4]->LAT->__toString();
            $o_Global_Geopositioning_att_Point_4_LON = $xml->Geoposition_Informations->Geopositioning->Global_Geopositioning->Point[4]->LON->__toString();
            $o_Global_Geopositioning_att_Point_4_X = $xml->Geoposition_Informations->Geopositioning->Global_Geopositioning->Point[4]->X->__toString();
            $o_Global_Geopositioning_att_Point_4_Y = $xml->Geoposition_Informations->Geopositioning->Global_Geopositioning->Point[4]->Y->__toString();
            /*
            Bloc:  <Statistic_Informations>
            */
            //Global_Statistic
            $o_KAPPA = $xml->Product_Characteristics->Global_Statistic->KAPPA;
            $o_OA = $xml->Product_Characteristics->Global_Statistic->OA;
            //Statistic_List
            $o_Statistic_List = $xml->Product_Characteristics->Statistic_List;
        }
        //   /*
        //   XML String
        //   */
        //   $myXMLData_Metadata_Identification =
        //   " <Metadata_Identification>
        //       <METADATA_FORMAT version='1.16'>METADATA_MUSCATE</METADATA_FORMAT>
        //       <METADATA_PROFILE>DISTRIBUTED</METADATA_PROFILE>
        //       <METADATA_INFORMATION>EXPERT</METADATA_INFORMATION>
        //     </Metadata_Identification>
        //   ";
        //   $myXMLData_Dataset_Identification =
        //   "
        //     <Dataset_Identification>
        //       <IDENTIFIER>OSO_20200101_VECTOR_departement_01</IDENTIFIER>
        //       <AUTHORITY>THEIA</AUTHORITY>
        //       <PRODUCER>MUSCATE</PRODUCER>
        //       <PROJECT>OSO</PROJECT>
        //       <GEOGRAPHICAL_ZONE type='Tile'>FRANCE</GEOGRAPHICAL_ZONE>
        //       <TITLE>Produit carte d'occupation des sols</TITLE>
        //       <DESCRIPTION><![CDATA[Correpsond à la description du produit OSO]]></DESCRIPTION>
        //     </Dataset_Identification>

        //   " ;
        //   $myXMLData_Product_Characteristics =  "
        //     <Product_Characteristics>
        //       <PRODUCT_ID>OSO_20200101_VECTOR_departement_01_V1-0</PRODUCT_ID>
        //       <ACQUISITION_DATE>2020-01-01T00:00:00Z</ACQUISITION_DATE>
        //       <PRODUCTION_DATE>2021-12-03T05:04:52Z</PRODUCTION_DATE>
        //       <PRODUCT_VERSION>1.0</PRODUCT_VERSION>
        //       <PRODUCT_LEVEL>L3B-OSO</PRODUCT_LEVEL>
        //       <PLATFORM>OSO</PLATFORM>
        //       <ORBIT_NUMBER type='Orbit'>500</ORBIT_NUMBER>
        //       <UTC_Acquisition_Range>
        //           <MEAN>2020-01-01T00:00:00Z</MEAN>
        //           <DATE_PRECISION unit='s'>0.001</DATE_PRECISION>
        //       </UTC_Acquisition_Range>
        //       <Band_Global_List count='1'>
        //         <BAND_ID>B2</BAND_ID>
        //       </Band_Global_List>
        //       <Band_Group_List>
        //         <Group group_id='ALL'>
        //           <Band_List count='1'>
        //             <BAND_ID>B2</BAND_ID>
        //           </Band_List>
        //         </Group>
        //        </Band_Group_List>
        //     </Product_Characteristics>
        //   ";
        //   $myXMLData_Product_Organisation =  "
        //     <Product_Organisation>
        //       <Distributed_Product>
        //         <QUICKLOOK>OSO_20200101_VECTOR_departement_01_V1-0_QKL_ALL.png</QUICKLOOK>
        //         <THUMBNAIL>OSO_20200101_VECTOR_departement_01_V1-0_THB_ALL.png</THUMBNAIL>
        //         <PYRAMID>OSO_20200101_VECTOR_departement_01_V1-0_CLASSIFICATION_PYR_ALL.png</PYRAMID>
        //         <ARCHIVE>OSO_20200101_VECTOR_departement_01_V1-0.zip</ARCHIVE>
        //         <EXPERTISE/>
        //         <PUBLIC_METADATA>./PUBLIC_METADATA/OSO_20200101_VECTOR_departement_01_V1-0_MTD_ALL.xml</PUBLIC_METADATA>
        //       </Distributed_Product>
        //     </Product_Organisation>
        //   ";
        //   $myXMLData_Geoposition_Informations =  "
        //     <Geoposition_Informations>
        //       <Coordinate_Reference_System>
        //         <GEO_TABLES>EPSG</GEO_TABLES>
        //         <Horizontal_Coordinate_System>
        //           <HORIZONTAL_CS_TYPE>PROJECTED</HORIZONTAL_CS_TYPE>
        //           <HORIZONTAL_CS_NAME>WGS 84 / UTM zone 15N</HORIZONTAL_CS_NAME>
        //           <HORIZONTAL_CS_CODE>32615</HORIZONTAL_CS_CODE>
        //         </Horizontal_Coordinate_System>
        //       </Coordinate_Reference_System>
        //       <Raster_CS>
        //         <RASTER_CS_TYPE>CELL</RASTER_CS_TYPE>
        //         <PIXEL_ORIGIN>0</PIXEL_ORIGIN>
        //       </Raster_CS>
        //       <Metadata_CS>
        //         <METADATA_CS_TYPE>CELL</METADATA_CS_TYPE>
        //         <PIXEL_ORIGIN>0</PIXEL_ORIGIN>
        //       </Metadata_CS>
        //       <Geopositioning>
        //         <Global_Geopositioning>
        //           <Point name='upperLeft'>
        //             <LAT>46.5248585</LAT>
        //             <LON>4.7204689</LON>
        //             <X>5864860.829</X>
        //             <Y>525480.19</Y>
        //           </Point>
        //           <Point name='upperRight'>
        //             <LAT>46.5248585</LAT>
        //             <LON>6.1758592</LON>
        //             <X>5864860.829</X>
        //             <Y>687493.507</Y>
        //          </Point>
        //           <Point name='lowerRight'>
        //             <LAT>45.5988103</LAT>
        //             <LON>6.1758592</LON>
        //             <X>5716289.729</X>
        //             <Y>687493.507</Y>
        //           </Point>
        //           <Point name='lowerLeft'>
        //             <LAT>45.5988103</LAT>
        //             <LON>4.7204689</LON>
        //             <X>5716289.729</X>
        //             <Y>525480.19</Y>
        //           </Point>
        //           <Point name='center'>
        //             <LAT>46.0637760827</LAT>
        //             <LON>5.44816405176</LON>
        //             <X>5790575.279</X>
        //             <Y>606486.848</Y>
        //           </Point>
        //         </Global_Geopositioning>
        //       </Geopositioning>
        //     </Geoposition_Informations>
        //   ";
        //   $myXMLData_Statistic_Informations =  "
        //     <Statistic_Informations>
        //       <Global_Statistic>
        //         <KAPPA/>
        //         <OA/>
        //       </Global_Statistic>
        //       <Statistic_List>
        //       </Statistic_List>
        //     </Statistic_Informations>
        //   ";

        //   /* The function reads xml data
        //  from the passed string */
        //  $xml_Metadata_Identification = simplexml_load_string($myXMLData_Metadata_Identification) or die("Error: Cannot create xml data object");
        //  $xml_Dataset_Identification = simplexml_load_string($myXMLData_Dataset_Identification) or die("Error: Cannot create xml data object");
        //  $xml_Product_Characteristics = simplexml_load_string($myXMLData_Product_Characteristics) or die("Error: Cannot create xml data object");
        //  $xml_Product_Organisation = simplexml_load_string($myXMLData_Product_Organisation) or die("Error: Cannot create xml data object");
        //  $xml_Geoposition_Informations = simplexml_load_string($myXMLData_Geoposition_Informations) or die("Error: Cannot create xml data object");
        //  $xml_Statistic_Informations = simplexml_load_string($myXMLData_Statistic_Informations) or die("Error: Cannot create xml data object");
        //  /*
        //  LIST String form XML
        //  */
        // // StdISO  gmd:fileIdentifier
        //   $identifiant = $xml_Dataset_Identification ->xpath('/Dataset_Identification/IDENTIFIER');
        //   $fileIdentifier_CharacterString = $identifiant[0];

        // // StdISO gmd:metadataStandardName
        //   $title = $xml_Dataset_Identification ->xpath('/Dataset_Identification/TITLE');
        //   $metadataStandardName_CharacterString = $title[0];

?>
