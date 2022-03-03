<?php ini_set('display_errors', 'on'); ?>
        <?php
        /*
        XML String 
        */
        $myXMLData_Metadata_Identification = 
        " <Metadata_Identification>
            <METADATA_FORMAT version='1.16'>METADATA_MUSCATE</METADATA_FORMAT>
            <METADATA_PROFILE>DISTRIBUTED</METADATA_PROFILE>
            <METADATA_INFORMATION>EXPERT</METADATA_INFORMATION>
          </Metadata_Identification>
        ";
        $myXMLData_Dataset_Identification =
        "
          <Dataset_Identification>
            <IDENTIFIER>OSO_20200101_VECTOR_departement_01</IDENTIFIER>
            <AUTHORITY>THEIA</AUTHORITY>
            <PRODUCER>MUSCATE</PRODUCER>
            <PROJECT>OSO</PROJECT>
            <GEOGRAPHICAL_ZONE type='Tile'>FRANCE</GEOGRAPHICAL_ZONE>
            <TITLE>Produit carte d'occupation des sols</TITLE>
            <DESCRIPTION><![CDATA[Correpsond à la description du produit OSO]]></DESCRIPTION>
          </Dataset_Identification>
      
        " ;
        $myXMLData_Product_Characteristics =  "
          <Product_Characteristics>
            <PRODUCT_ID>OSO_20200101_VECTOR_departement_01_V1-0</PRODUCT_ID>
            <ACQUISITION_DATE>2020-01-01T00:00:00Z</ACQUISITION_DATE>
            <PRODUCTION_DATE>2021-12-03T05:04:52Z</PRODUCTION_DATE>
            <PRODUCT_VERSION>1.0</PRODUCT_VERSION>
            <PRODUCT_LEVEL>L3B-OSO</PRODUCT_LEVEL>
            <PLATFORM>OSO</PLATFORM>
            <ORBIT_NUMBER type='Orbit'>500</ORBIT_NUMBER>
            <UTC_Acquisition_Range>
                <MEAN>2020-01-01T00:00:00Z</MEAN>
                <DATE_PRECISION unit='s'>0.001</DATE_PRECISION>
            </UTC_Acquisition_Range>
            <Band_Global_List count='1'>
              <BAND_ID>B2</BAND_ID>
            </Band_Global_List>
            <Band_Group_List>
              <Group group_id='ALL'>
                <Band_List count='1'>
                  <BAND_ID>B2</BAND_ID>
                </Band_List>
              </Group>
             </Band_Group_List>
          </Product_Characteristics>
        ";
        $myXMLData_Product_Organisation =  "
          <Product_Organisation>
            <Distributed_Product>
              <QUICKLOOK>OSO_20200101_VECTOR_departement_01_V1-0_QKL_ALL.png</QUICKLOOK>
              <THUMBNAIL>OSO_20200101_VECTOR_departement_01_V1-0_THB_ALL.png</THUMBNAIL>
              <PYRAMID>OSO_20200101_VECTOR_departement_01_V1-0_CLASSIFICATION_PYR_ALL.png</PYRAMID>
              <ARCHIVE>OSO_20200101_VECTOR_departement_01_V1-0.zip</ARCHIVE>
              <EXPERTISE/>
              <PUBLIC_METADATA>./PUBLIC_METADATA/OSO_20200101_VECTOR_departement_01_V1-0_MTD_ALL.xml</PUBLIC_METADATA>
            </Distributed_Product>
          </Product_Organisation>
        ";
        $myXMLData_Geoposition_Informations =  "
          <Geoposition_Informations>
            <Coordinate_Reference_System>
              <GEO_TABLES>EPSG</GEO_TABLES>
              <Horizontal_Coordinate_System>
                <HORIZONTAL_CS_TYPE>PROJECTED</HORIZONTAL_CS_TYPE>
                <HORIZONTAL_CS_NAME>WGS 84 / UTM zone 15N</HORIZONTAL_CS_NAME>
                <HORIZONTAL_CS_CODE>32615</HORIZONTAL_CS_CODE>
              </Horizontal_Coordinate_System>
            </Coordinate_Reference_System>
            <Raster_CS>
              <RASTER_CS_TYPE>CELL</RASTER_CS_TYPE>
              <PIXEL_ORIGIN>0</PIXEL_ORIGIN>
            </Raster_CS>
            <Metadata_CS>
              <METADATA_CS_TYPE>CELL</METADATA_CS_TYPE>
              <PIXEL_ORIGIN>0</PIXEL_ORIGIN>
            </Metadata_CS>
            <Geopositioning>
              <Global_Geopositioning>
                <Point name='upperLeft'>
                  <LAT>46.5248585</LAT>
                  <LON>4.7204689</LON>
                  <X>5864860.829</X>
                  <Y>525480.19</Y>
                </Point>
                <Point name='upperRight'>
                  <LAT>46.5248585</LAT>
                  <LON>6.1758592</LON>
                  <X>5864860.829</X>
                  <Y>687493.507</Y>
               </Point>
                <Point name='lowerRight'>
                  <LAT>45.5988103</LAT>
                  <LON>6.1758592</LON>
                  <X>5716289.729</X>
                  <Y>687493.507</Y>
                </Point>
                <Point name='lowerLeft'>
                  <LAT>45.5988103</LAT>
                  <LON>4.7204689</LON>
                  <X>5716289.729</X>
                  <Y>525480.19</Y>
                </Point>
                <Point name='center'>
                  <LAT>46.0637760827</LAT>
                  <LON>5.44816405176</LON>
                  <X>5790575.279</X>
                  <Y>606486.848</Y>
                </Point>
              </Global_Geopositioning>
            </Geopositioning>
          </Geoposition_Informations>
        ";
        $myXMLData_Statistic_Informations =  "
          <Statistic_Informations>
            <Global_Statistic>
              <KAPPA/>
              <OA/>
            </Global_Statistic>
            <Statistic_List>
            </Statistic_List>
          </Statistic_Informations>
        ";

        /* The function reads xml data
       from the passed string */
       $xml_Metadata_Identification = simplexml_load_string($myXMLData_Metadata_Identification) or die("Error: Cannot create xml data object");
       $xml_Dataset_Identification = simplexml_load_string($myXMLData_Dataset_Identification) or die("Error: Cannot create xml data object");
       $xml_Product_Characteristics = simplexml_load_string($myXMLData_Product_Characteristics) or die("Error: Cannot create xml data object");
       $xml_Product_Organisation = simplexml_load_string($myXMLData_Product_Organisation) or die("Error: Cannot create xml data object");
       $xml_Geoposition_Informations = simplexml_load_string($myXMLData_Geoposition_Informations) or die("Error: Cannot create xml data object");
       $xml_Statistic_Informations = simplexml_load_string($myXMLData_Statistic_Informations) or die("Error: Cannot create xml data object");
       /*
       LIST String form XML
       */
      // StdISO  gmd:fileIdentifier 
        $identifiant = $xml_Dataset_Identification ->xpath('/Dataset_Identification/IDENTIFIER');
        $fileIdentifier_CharacterString = $identifiant[0];

      // StdISO gmd:metadataStandardName
        $title = $xml_Dataset_Identification ->xpath('/Dataset_Identification/TITLE');
        $metadataStandardName_CharacterString = $title[0];
        

      
        ?>
