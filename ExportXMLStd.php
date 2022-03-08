<?php ini_set('display_errors', 'on'); ?>
        <?php
        include 'getStringXML.php';
        $dom = new DOMDocument();
        $dom->encoding = 'utf-8';
        $dom->xmlVersion = '1.0';
        $dom->formatOutput = true;
        $xml_file_name =
            'OSO_20200101_VECTOR_departement_01_V1-0_MTD_ALL_stdISO.xml';
        // // If the $xml_file_name file in existing directory already exist, delete it by unlink()
        // if (!unlink($xml_file_name)) {
        //     echo "$file_pointer cannot be deleted due to an error";
        // } else {

        /******************************** 
        ******************************** 
            Bloc Metadata Identifier Content
            ******************************** 
            *********************************/

        /*********************************  
          gmi:Muscate_Metadata_Document 
          OSO - <Metadata_Identification>
          ********************************/

        // START Un premier élément'gmi:MI_Metadata'

        $root = $dom->createElement('gmi:MI_Metadata');

        //set Attributs of élément 'gmi:MI_Metadata'

        $attr_root_xsi = new DOMAttr(
            'xmlns:xsi',
            (string) $o_Muscate_Metadata_Document_DocNamespaces_xsi
        );
        $root->setAttributeNode($attr_root_xsi);

        $attr_root_xsi_noNamespaceSchemaLocation = new DOMAttr(
            'xsi:noNamespaceSchemaLocation',
            (string) $o_Muscate_Metadata_Document_xsi
        );
        $root->setAttributeNode($attr_root_xsi_noNamespaceSchemaLocation);

        $attr_root_oes = new DOMAttr(
            'xmlns:eos',
            'http://earthdata.nasa.gov/schema/eos'
        );
        $root->setAttributeNode($attr_root_oes);

        $attr_root_gco = new DOMAttr(
            'xmlns:gco',
            'http://www.isotc211.org/2005/gco'
        );
        $root->setAttributeNode($attr_root_gco);

        $attr_root_gmd = new DOMAttr(
            'xmlns:gmd',
            'http://www.isotc211.org/2005/gmd'
        );
        $root->setAttributeNode($attr_root_gmd);

        $attr_root_gml = new DOMAttr(
            'xmlns:gml',
            'http://www.opengis.net/gml/3.2'
        );
        $root->setAttributeNode($attr_root_gml);

        $attr_root_gmi = new DOMAttr(
            'xmlns:gmi',
            'http://www.isotc211.org/2005/gmi'
        );
        $root->setAttributeNode($attr_root_gmi);

        $attr_root_gmx = new DOMAttr(
            'xmlns:gmx',
            'http://www.isotc211.org/2005/gmx'
        );
        $root->setAttributeNode($attr_root_gmx);

        $attr_root_gsr = new DOMAttr(
            'xmlns:gsr',
            'http://www.isotc211.org/2005/gsr'
        );
        $root->setAttributeNode($attr_root_gsr);

        $attr_root_gss = new DOMAttr(
            'xmlns:gss',
            'http://www.isotc211.org/2005/gss'
        );
        $root->setAttributeNode($attr_root_gss);

        $attr_root_gts = new DOMAttr(
            'xmlns:gts',
            'http://www.isotc211.org/2005/gts'
        );
        $root->setAttributeNode($attr_root_gts);

        $attr_root_srv = new DOMAttr(
            'xmlns:srv',
            'http://www.isotc211.org/2005/srv'
        );
        $root->setAttributeNode($attr_root_srv);

        $attr_root_swe = new DOMAttr(
            'xmlns:swe',
            'http://schemas.opengis.net/sweCommon/2.0/'
        );
        $root->setAttributeNode($attr_root_swe);

        $attr_root_xlink = new DOMAttr(
            'xmlns:xlink',
            'http://www.w3.org/1999/xlink'
        );
        $root->setAttributeNode($attr_root_xlink);

        $attr_root_xs = new DOMAttr(
            'xmlns:xs',
            'http://www.w3.org/2001/XMLSchema'
        );
        $root->setAttributeNode($attr_root_xs);

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
        // //gmd:language
        // $gmdLanguage_node = $dom->createElement('gmd:language');
        // // gmd:language/gco:CharacterString
        // $gcoCharacterString_node = $dom->createElement(
        //     'gco:CharacterString',
        //     'eng'
        // );
        // $gmdLanguage_node->appendChild($gcoCharacterString_node);
        // $root->appendChild($gmdLanguage_node);
      
        /*********************************  
          Bloc: gmd:characterSet
          OSO :
          ********************************/
        // //gmd:characterSet
        // $gmdLanguage_node = $dom->createElement('gmd:characterSet');
        // // gmd:characterSet/gmd:MD_CharacterSetCode
        // $gmdMD_CharacterSetCode_node = $dom->createElement(
        //     'gmd:MD_CharacterSetCode',
        //     'utf8'
        // );
        // $attr_MD_codeList = new DOMAttr(
        //     'codeList',
        //     'http://www.ngdc.noaa.gov/metadata/published/xsd/schema/resources/Codelist/gmxCodelists.xml#MD_CharacterSetCode'
        // );
        // $attr_MD_codeListValue = new DOMAttr('codeListValue', 'utf8');
        // $gmdMD_CharacterSetCode_node->setAttributeNode($attr_MD_codeList);
        // $gmdMD_CharacterSetCode_node->setAttributeNode($attr_MD_codeListValue);
        // $gmdLanguage_node->appendChild($gmdMD_CharacterSetCode_node);
        // $root->appendChild($gmdLanguage_node);

        /*********************************  
          Bloc: gmd:hierarchyLevel
          OSO :
          ********************************/

        // //gmd:hierarchyLevel
        // $gmdHierarchyLevel_node = $dom->createElement('gmd:hierarchyLevel');
        // //gmd:MD_ScopeCode
        // $gmdMD_ScopeCode_node = $dom->createElement(
        //     'gmd:MD_ScopeCode',
        //     'series'
        // );
        // $attr_MD_codeList = new DOMAttr(
        //     'codeList',
        //     'http://www.ngdc.noaa.gov/metadata/published/xsd/schema/resources/Codelist/gmxCodelists.xml#MD_ScopeCode'
        // );
        // $attr_MD_codeListValue = new DOMAttr('codeListValue', 'series');
        // $gmdMD_ScopeCode_node->setAttributeNode($attr_MD_codeList);
        // $gmdMD_ScopeCode_node->setAttributeNode($attr_MD_codeListValue);
        // $gmdHierarchyLevel_node->appendChild($gmdMD_ScopeCode_node);
        // $root->appendChild($gmdHierarchyLevel_node);

        /*********************************  
          Bloc:  gmd:contact
          OSO :  PRODUCER
          ********************************/
        //gmd:contact
        $gmdContact_node = $dom->createElement('gmd:contact',$o_PRODUCER);
        $root->appendChild($gmdContact_node);


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
          Bloc:  gmd:dateStamp
          OSO :  PRODUCTION_DATE
          ********************************/
        /*
            Bloc gmd:metadataStandardName
            */
        //gmd:metadataStandardName
        $gmdMetadataStandardName_node = $dom->createElement(
            'gmd:metadataStandardName'
        );
        //gco:CharacterString
        $gcoCharacterString = $dom->createElement(
            'gco:CharacterString',
            $o_TITLE
        );
        $gmdMetadataStandardName_node->appendChild($gcoCharacterString);
        $root->appendChild($gmdMetadataStandardName_node);

        /*
            Bloc gmd:metadataStandardVersion
            */
        //gmd:metadataStandardVersion
        $gmdMetadataStandardVersion_node = $dom->createElement(
            'gmd:metadataStandardVersion',
            'ISO 19115-2 Geographic Information - Metadata Part 2 Extensions for imagery and gridded data'
        );
        //gco:CharacterString
        $gcoCharacterString = $dom->createElement(
            'gco:CharacterString',
            'ISO 19115-2:2009(E)'
        );
        $gmdMetadataStandardVersion_node->appendChild($gcoCharacterString);
        $root->appendChild($gmdMetadataStandardVersion_node);

        /*
            Bloc gmd:identificationInfo
            */
        //gmd:identificationInfo
        $gmdIdentificationInfo_node = $dom->createElement(
            'gmd:identificationInfo'
        );
        //gmd:identificationInfo -> gmd:MD_DataIdentification
        $gmdMD_DataIdentification_node = $dom->createElement(
            'gmd:MD_DataIdentification'
        );
        //-------------------gmd:citation----------------------------------------
        //gmd:identificationInfo -> gmd:MD_DataIdentification -> gmd:citation
        $gmdCitation_node = $dom->createElement('gmd:citation');

        //gmd:citation -> gmd:CI_Citation
        $gmdCI_Citation_node = $dom->createElement('gmd:CI_Citation');

        // gmd:citation -> gmd:CI_Citation -> gmd:title
        $gmdCI_Citation_gmdTitle_node = $dom->createElement('gmd:title');

        // gmd:citation -> gmd:CI_Citation -> gmd:title -> gco:CharacterString
        $gmdCI_Citation_gmdTitle_gcoCharacterString_node = $dom->createElement(
            'gco:CharacterString',
            $o_TITLE
        );

        // gmd:citation -> gmd:CI_Citation -> gmd:date (revision)
        $gmdCI_Citation_gmdDate_revision_node = $dom->createElement('gmd:date');
        $gmdCI_Citation_gmdDate_revision_gmdCI_Date_node = $dom->createElement(
            'gmd:CI_Date'
        );

        $gmdCI_Citation_gmdDate_revision_gmdCI_Date_Date_node = $dom->createElement(
            'gmd:date'
        );
        $gmdCI_Citation_gmdDate_revision_gmdCI_Date_DateTime_node = $dom->createElement(
            'gco:DateTime',
            $o_PRODUCTION_DATE
        );

        $gmdCI_Citation_gmdDate_revision_gmdCI_Date_DateType_node = $dom->createElement(
            'gmd:dateType'
        );
        $gmdCI_Citation_gmdDate_revision_gmdCI_dateType_DateTimeCode_node = $dom->createElement(
            'gmd:CI_DateTypeCode',
            'revision'
        );
        $attr_revision_gmdCI_DateTypeCode = new DOMAttr(
            'codeList',
            'http://www.ngdc.noaa.gov/metadata/published/xsd/schema/resources/Codelist/gmxCodelists.xml#CI_DateTypeCode'
        );
        $attr_revision_gmdCI_DateTypeCodeValue = new DOMAttr(
            'codeListValue',
            'revision'
        );
        $gmdCI_Citation_gmdDate_revision_gmdCI_dateType_DateTimeCode_node->setAttributeNode(
            $attr_revision_gmdCI_DateTypeCode
        );
        $gmdCI_Citation_gmdDate_revision_gmdCI_dateType_DateTimeCode_node->setAttributeNode(
            $attr_revision_gmdCI_DateTypeCodeValue
        );

        // gmd:citation -> gmd:CI_Citation -> gmd:date (creation)
        $gmdCI_Citation_gmdDate_creation_node = $dom->createElement('gmd:date');
        $gmdCI_Citation_gmdDate_creation_gmdCI_Date_node = $dom->createElement(
            'gmd:CI_Date'
        );

        $gmdCI_Citation_gmdDate_creation_gmdCI_Date_Date_node = $dom->createElement(
            'gmd:date'
        );
        $gmdCI_Citation_gmdDate_creation_gmdCI_Date_DateTime_node = $dom->createElement(
            'gco:DateTime',
            $o_ACQUISITION_DATE
        );

        $gmdCI_Citation_gmdDate_creation_gmdCI_Date_DateType_node = $dom->createElement(
            'gmd:dateType'
        );
        $gmdCI_Citation_gmdDate_creation_gmdCI_dateType_DateTimeCode_node = $dom->createElement(
            'gmd:CI_DateTypeCode',
            'creation'
        );
        $attr_creation_gmdCI_DateTypeCode = new DOMAttr(
            'codeList',
            'http://www.ngdc.noaa.gov/metadata/published/xsd/schema/resources/Codelist/gmxCodelists.xml#CI_DateTypeCode'
        );
        $attr_creation_gmdCI_DateTypeCodeValue = new DOMAttr(
            'codeListValue',
            'creation'
        );
        $gmdCI_Citation_gmdDate_creation_gmdCI_dateType_DateTimeCode_node->setAttributeNode(
            $attr_creation_gmdCI_DateTypeCode
        );
        $gmdCI_Citation_gmdDate_creation_gmdCI_dateType_DateTimeCode_node->setAttributeNode(
            $attr_creation_gmdCI_DateTypeCodeValue
        );

        // gmd:citation -> gmd:CI_Citation -> gmd:identifier
        $gmdCI_Citation_gmdIdentifier_node = $dom->createElement(
            'gmd:identifier'
        );
        $gmdCI_Citation_gmdIdentifier_MD_Identifier_node = $dom->createElement(
            'gmd:MD_Identifier'
        );
        $gmdCI_Citation_gmdIdentifier_MD_Identifier_Code_node = $dom->createElement(
            'gmd:code'
        );
        $gmdCI_Citation_gmdIdentifier_MD_Identifier_Code_String_node = $dom->createElement(
            'gco:CharacterString',
            $o_PRODUCT_ID
        );
        $gmdCI_Citation_gmdIdentifier_MD_Identifier_Version_node = $dom->createElement(
            'gmd:version'
        );
        $gmdCI_Citation_gmdIdentifier_MD_Identifier_Version_String_node = $dom->createElement(
            'gco:CharacterString',
            $o_PRODUCT_VERSION
        );

        //---------------------gmd:abstract------------------------------------------
        //gmd:identificationInfo -> gmd:MD_DataIdentification -> gmd:abstract
        $gmdAbstract_node = $dom->createElement('gmd:abstract');
        $gmdAbstract_String_node = $dom->createElement(
            'gco:CharacterString',
            $o_DESCRIPTION
        );
        //---------------------gmd:purpose------------------------------------------
        $gmdPurpose_node = $dom->createElement('gmd:purpose');
        $attr_gmdPurpose_Value = new DOMAttr('gco:nilReason', 'missing');
        $gmdPurpose_node->setAttributeNode($attr_gmdPurpose_Value);
        //---------------------gmd:descriptiveKeywords (projet)------------------------------------------
        $gmdDescriptiveKeywords_node = $dom->createElement(
            'gmd:descriptiveKeywords'
        );
        //gmd:descriptiveKeywords -> gmd:MD_Keywords
        $gmdDescriptiveKeywords_MD_node = $dom->createElement(
            'gmd:MD_Keywords'
        );
        //gmd:descriptiveKeywords -> gmd:MD_Keywords ->gmd:keyword
        $gmdDescriptiveKeywords_MD_keyword_projet_node = $dom->createElement(
            'gmd:keyword'
        );
        $gmdDescriptiveKeywords_MD_type_projet_node = $dom->createElement(
            'gmd:type'
        );
        //gmd:descriptiveKeywords -> gmd:MD_Keywords ->gmd:keyword -> gco:CharacterString
        $gmdDescriptiveKeywords_MD_keyword_projet_String_node = $dom->createElement(
            'gco:CharacterString',
            $o_PROJECT
        );
        $gmdDescriptiveKeywords_MD_type_projet_String_node = $dom->createElement(
            'codeList',
            'projet'
        );
        $gmdDescriptiveKeywords_thesaurusName_projet_node = $dom->createElement(
            'gmd:thesaurusName'
        );

        $attr_gmdDescriptiveKeywords_MD_type_projet_CodeList = new DOMAttr(
            'gco:nilReason',
            'http://www.ngdc.noaa.gov/metadata/published/xsd/schema/resources/Codelist/gmxCodelists.xml#MD_KeywordTypeCode'
        );
        $attr_gmdDescriptiveKeywords_MD_type_projet_Value = new DOMAttr(
            'codeListValue',
            'projet'
        );
        $attr_gmdDescriptiveKeywords_thesaurusName_projet_CodeList = new DOMAttr(
            'gco:nilReason',
            'unknown'
        );

        $gmdDescriptiveKeywords_MD_type_projet_String_node->setAttributeNode(
            $attr_gmdDescriptiveKeywords_MD_type_projet_CodeList
        );
        $gmdDescriptiveKeywords_MD_type_projet_String_node->setAttributeNode(
            $attr_gmdDescriptiveKeywords_MD_type_projet_Value
        );
        $gmdDescriptiveKeywords_thesaurusName_projet_node->setAttributeNode(
            $attr_gmdDescriptiveKeywords_thesaurusName_projet_CodeList
        );

        //---------------------gmd:aggregationInfo------------------------------------------
        //---------------------gmd:language------------------------------------------
        //---------------------gmd:extent------------------------------------------
        //---------------------gmd:processingLevel------------------------------------------

        //appendChild Nodes
        //----L7----
        $gmdCI_Citation_gmdDate_revision_gmdCI_Date_DateType_node->appendChild(
            $gmdCI_Citation_gmdDate_revision_gmdCI_dateType_DateTimeCode_node
        );
        $gmdCI_Citation_gmdDate_revision_gmdCI_Date_Date_node->appendChild(
            $gmdCI_Citation_gmdDate_revision_gmdCI_Date_DateTime_node
        );
        $gmdCI_Citation_gmdDate_creation_gmdCI_Date_DateType_node->appendChild(
            $gmdCI_Citation_gmdDate_creation_gmdCI_dateType_DateTimeCode_node
        );
        $gmdCI_Citation_gmdDate_creation_gmdCI_Date_Date_node->appendChild(
            $gmdCI_Citation_gmdDate_creation_gmdCI_Date_DateTime_node
        );
        $gmdCI_Citation_gmdIdentifier_MD_Identifier_Code_node->appendChild(
            $gmdCI_Citation_gmdIdentifier_MD_Identifier_Code_String_node
        );
        $gmdCI_Citation_gmdIdentifier_MD_Identifier_Version_node->appendChild(
            $gmdCI_Citation_gmdIdentifier_MD_Identifier_Version_String_node
        );
        //----L6----
        $gmdCI_Citation_gmdDate_revision_gmdCI_Date_node->appendChild(
            $gmdCI_Citation_gmdDate_revision_gmdCI_Date_Date_node
        );
        $gmdCI_Citation_gmdDate_revision_gmdCI_Date_node->appendChild(
            $gmdCI_Citation_gmdDate_revision_gmdCI_Date_DateType_node
        );
        $gmdCI_Citation_gmdDate_creation_gmdCI_Date_node->appendChild(
            $gmdCI_Citation_gmdDate_creation_gmdCI_Date_Date_node
        );
        $gmdCI_Citation_gmdDate_creation_gmdCI_Date_node->appendChild(
            $gmdCI_Citation_gmdDate_creation_gmdCI_Date_DateType_node
        );

        $gmdCI_Citation_gmdIdentifier_MD_Identifier_node->appendChild(
            $gmdCI_Citation_gmdIdentifier_MD_Identifier_Code_node
        );
        $gmdCI_Citation_gmdIdentifier_MD_Identifier_node->appendChild(
            $gmdCI_Citation_gmdIdentifier_MD_Identifier_Version_node
        );

        //----L5----
        $gmdCI_Citation_gmdTitle_node->appendChild(
            $gmdCI_Citation_gmdTitle_gcoCharacterString_node
        );
        $gmdCI_Citation_gmdDate_creation_node->appendChild(
            $gmdCI_Citation_gmdDate_creation_gmdCI_Date_node
        );
        $gmdCI_Citation_gmdDate_revision_node->appendChild(
            $gmdCI_Citation_gmdDate_revision_gmdCI_Date_node
        );
        $gmdCI_Citation_gmdIdentifier_node->appendChild(
            $gmdCI_Citation_gmdIdentifier_MD_Identifier_node
        );
        $gmdDescriptiveKeywords_MD_keyword_projet_node->appendChild(
            $gmdDescriptiveKeywords_MD_keyword_projet_String_node
        );
        $gmdDescriptiveKeywords_MD_type_projet_node->appendChild(
            $gmdDescriptiveKeywords_MD_type_projet_String_node
        );
        //----L4----
        $gmdCI_Citation_node->appendChild($gmdCI_Citation_gmdTitle_node);
        $gmdCI_Citation_node->appendChild(
            $gmdCI_Citation_gmdDate_revision_node
        );
        $gmdCI_Citation_node->appendChild(
            $gmdCI_Citation_gmdDate_creation_node
        );
        $gmdCI_Citation_node->appendChild($gmdCI_Citation_gmdIdentifier_node);
        $gmdDescriptiveKeywords_MD_node->appendChild(
            $gmdDescriptiveKeywords_MD_keyword_projet_node
        );
        $gmdDescriptiveKeywords_MD_node->appendChild(
            $gmdDescriptiveKeywords_MD_type_projet_node
        );
        $gmdDescriptiveKeywords_MD_node->appendChild(
            $gmdDescriptiveKeywords_thesaurusName_projet_node
        );

        //----L3----
        $gmdCitation_node->appendChild($gmdCI_Citation_node);
        $gmdAbstract_node->appendChild($gmdAbstract_String_node);
        $gmdDescriptiveKeywords_node->appendChild(
            $gmdDescriptiveKeywords_MD_node
        );
        //----L2----
        $gmdMD_DataIdentification_node->appendChild($gmdCitation_node);
        $gmdMD_DataIdentification_node->appendChild($gmdAbstract_node);
        $gmdMD_DataIdentification_node->appendChild($gmdPurpose_node);
        $gmdMD_DataIdentification_node->appendChild(
            $gmdDescriptiveKeywords_node
        );

        //----L1----
        $gmdIdentificationInfo_node->appendChild(
            $gmdMD_DataIdentification_node
        );
        //----L0----
        $root->appendChild($gmdIdentificationInfo_node);

        /*
Bloc gmd:contentInfo   
*/

        //---------------------gmd:purpose------------------------------------------
        //----L5----
        //----L4----
        //----L3----
        //----L2----
        //----L1----
        //----L0----
        // $root->appendChild($gmdContentInfo_node);
        /*
Bloc gmd:dataQualityInfo
*/
        $gmdDataQualityInfo_node = $dom->createElement('gmd:dataQualityInfo');
        $gmdDataQualityInfo_DQ_DataQuality_node = $dom->createElement(
            'gmd:DQ_DataQuality'
        );
        //gmd:scope
        $gmdDataQualityInfo_DQ_DataQuality_scope_node = $dom->createElement(
            'gmd:scope'
        );
        //gmd:scope -> gmd:DQ_Scope
        $gmdDataQualityInfo_DQ_Scope_node = $dom->createElement('gmd:DQ_Scope');
        //gmd:scope -> gmd:DQ_Scope->gmd:level
        $gmdDataQualityInfo_DQ_Scope_level_node = $dom->createElement(
            'gmd:level'
        );

        //gmd:scope -> gmd:DQ_Scope->gmd:level ->gmd:MD_ScopeCode -
        $gmdDataQualityInfo_DQ_Scope_level_MD_ScopeCode_node = $dom->createElement(
            'gmd:MD_ScopeCode',
            'series'
        );
        $attr_gmdDataQualityInfo_DQ_Scope_level_MD_ScopeCode_CodeList = new DOMAttr(
            'codeList',
            'http://www.ngdc.noaa.gov/metadata/published/xsd/schema/resources/Codelist/gmxCodelists.xml#MD_ScopeCode'
        );
        $attr_gmdDataQualityInfo_DQ_Scope_level_MD_ScopeCode_Value = new DOMAttr(
            'codeListValue',
            'series'
        );
        $gmdDataQualityInfo_DQ_Scope_level_MD_ScopeCode_node->setAttributeNode(
            $attr_gmdDataQualityInfo_DQ_Scope_level_MD_ScopeCode_CodeList
        );
        $gmdDataQualityInfo_DQ_Scope_level_MD_ScopeCode_node->setAttributeNode(
            $attr_gmdDataQualityInfo_DQ_Scope_level_MD_ScopeCode_Value
        );
        //gmd:report
        $gmdDataQualityInfo_DQ_DataQuality_report_node = $dom->createElement(
            'gmd:report'
        );
        //gmd:report ->gmd:DQ_AccuracyOfATimeMeasurement
        $gmdDataQualityInfo_DQ_AccuracyOfATimeMeasurement_node = $dom->createElement(
            'gmd:DQ_AccuracyOfATimeMeasurement'
        );
        //gmd:report ->gmd:DQ_AccuracyOfATimeMeasurement->gmd:measureIdentification
        $gmdDataQualityInfo_DQ_AccuracyOfATimeMeasurement_measureId_node = $dom->createElement(
            'gmd:measureIdentification'
        );
        //gmd:report ->gmd:DQ_AccuracyOfATimeMeasurement->gmd:measureIdentification ->gmd:MD_Identifier
        $gmdDataQualityInfo_DQ_AccuracyOfATimeMeasurement_measureId_Id_node = $dom->createElement(
            'gmd:MD_Identifier'
        );
        //gmd:report ->gmd:DQ_AccuracyOfATimeMeasurement->gmd:measureIdentification ->gmd:MD_Identifier -> gmd:code
        $gmdDataQualityInfo_DQ_AccuracyOfATimeMeasurement_measureId_Id_code_node = $dom->createElement(
            'gmd:code'
        );
        //gmd:report ->gmd:DQ_AccuracyOfATimeMeasurement->gmd:measureIdentification ->gmd:MD_Identifier -> gmd:code-> gco:CharacterString
        $gmdDataQualityInfo_DQ_AccuracyOfATimeMeasurement_measureId_Id_code_String_node = $dom->createElement(
            'gco:CharacterString',
            $o_UTC_Acquisition_Range_DATE_PRECISION
        );
        //gmd:report ->gmd:DQ_AccuracyOfATimeMeasurement->gmd:result

        //gmd:report ->gmd:DQ_AccuracyOfATimeMeasurement->gmd:result->gmd:DQ_QuantitativeResult
        //gmd:report ->gmd:DQ_AccuracyOfATimeMeasurement->gmd:result->gmd:DQ_QuantitativeResult->gmd:valueUnit
        //gmd:report ->gmd:DQ_AccuracyOfATimeMeasurement->gmd:result->gmd:DQ_QuantitativeResult->gmd:value
        //gmd:report ->gmd:DQ_AccuracyOfATimeMeasurement->gmd:result->gmd:DQ_QuantitativeResult->gmd:value->gco:Record
        //gmd:report ->gmd:DQ_AccuracyOfATimeMeasurement->gmd:result->gmd:DQ_QuantitativeResult->gmd:value->gco:Record->gco:Real

        //----L7----
        $gmdDataQualityInfo_DQ_AccuracyOfATimeMeasurement_measureId_Id_code_node->appendChild(
            $gmdDataQualityInfo_DQ_AccuracyOfATimeMeasurement_measureId_Id_code_String_node
        );
        //----L6----
        $gmdDataQualityInfo_DQ_AccuracyOfATimeMeasurement_measureId_Id_node->appendChild(
            $gmdDataQualityInfo_DQ_AccuracyOfATimeMeasurement_measureId_Id_code_node
        );
        //----L5----
        $gmdDataQualityInfo_DQ_AccuracyOfATimeMeasurement_measureId_node->appendChild(
            $gmdDataQualityInfo_DQ_AccuracyOfATimeMeasurement_measureId_Id_node
        );
        $gmdDataQualityInfo_DQ_Scope_level_node->appendChild(
            $gmdDataQualityInfo_DQ_Scope_level_MD_ScopeCode_node
        );
        //----L4----
        $gmdDataQualityInfo_DQ_AccuracyOfATimeMeasurement_node->appendChild(
            $gmdDataQualityInfo_DQ_AccuracyOfATimeMeasurement_measureId_node
        );
        $gmdDataQualityInfo_DQ_Scope_node->appendChild(
            $gmdDataQualityInfo_DQ_Scope_level_node
        );
        //----L3----
        $gmdDataQualityInfo_DQ_DataQuality_report_node->appendChild(
            $gmdDataQualityInfo_DQ_AccuracyOfATimeMeasurement_node
        );
        $gmdDataQualityInfo_DQ_DataQuality_scope_node->appendChild(
            $gmdDataQualityInfo_DQ_Scope_node
        );
        //----L2----
        $gmdDataQualityInfo_DQ_DataQuality_node->appendChild(
            $gmdDataQualityInfo_DQ_DataQuality_scope_node
        );
        $gmdDataQualityInfo_DQ_DataQuality_node->appendChild(
            $gmdDataQualityInfo_DQ_DataQuality_report_node
        );

        //----L1----
        $gmdDataQualityInfo_node->appendChild(
            $gmdDataQualityInfo_DQ_DataQuality_node
        );
        //----L0----
        $root->appendChild($gmdDataQualityInfo_node);

        /*
        Bloc gmi:acquisitionInformation
        */
        $gmiAcquisitionInformation_node = $dom->createElement(
            'gmi:acquisitionInformation'
        );
        $gmi_MI_AcquisitionInformation_node = $dom->createElement(
            'gmi:MI_AcquisitionInformation'
        );
        //---------------------gmi:MI_AcquisitionInformation->gmi:operation------------------------------------------
        $gmi_MI_Acquis_operation_node = $dom->createElement('gmi:operation');
        // gmi:operation->gmi:MI_Operation
        $gmi_MI_Acquis_operation_MI_Operation_node = $dom->createElement(
            'gmi:MI_Operation'
        );
        $gmi_MI_Acquis_operation_MI_Operation_description_node = $dom->createElement(
            'gmi:description'
        );
        $gmi_MI_Acquis_operation_MI_Operation_identifier_node = $dom->createElement(
            'gmi:identifier'
        );
        $gmi_MI_Acquis_operation_MI_Operation_status_node = $dom->createElement(
            'gmi:status'
        );
        $gmi_MI_Acquis_operation_MI_Operation_parentOperation_node = $dom->createElement(
            'gmi:parentOperation'
        );
        $attr_gmi_MI_Acquis_operation_MI_Operation_parentOperation_Value = new DOMAttr(
            'gco:nilReason',
            'inapplicable'
        );
        $gmi_MI_Acquis_operation_MI_Operation_parentOperation_node->setAttributeNode(
            $attr_gmi_MI_Acquis_operation_MI_Operation_parentOperation_Value
        );

        // gmi:description -> gco:CharacterString
        $gmi_MI_Acquis_operation_MI_Operation_description_String_node = $dom->createElement(
            'gco:CharacterString'
        );
        // gmi:identifier -> gmd:MD_Identifier
        $gmi_MI_Acquis_operation_MI_Operation_identifier_MD_Identifier_node = $dom->createElement(
            'gmd:MD_Identifier'
        );
        // gmi:identifier -> gmd:MD_Identifier -> gmd:code
        $gmi_MI_Acquis_operation_MI_Operation_identifier_MD_Identifier_code_node = $dom->createElement(
            'gmd:code'
        );
        // gmi:identifier -> gmd:MD_Identifier -> gmd:code -> gco:CharacterString
        $gmi_MI_Acquis_operation_MI_Operation_identifier_MD_Identifier_code_String_node = $dom->createElement(
            'gco:CharacterString',
            $o_PROJECT
        );

        //---------------------gmi:MI_AcquisitionInformation->gmi:platform------------------------------------------
        $gmi_MI_Acquis_platform_node = $dom->createElement('gmi:platform');
        $gmi_MI_Acquis_platform_EOS_Platform_node = $dom->createElement(
            'eos:EOS_Platform'
        );
        //------******5******------//
        //gmi:platform->eos:EOS_Platform->gmi:identifier
        $gmi_MI_Acquis_platform_EOS_Platform_identifier_node = $dom->createElement(
            'gmi:identifier'
        );
        //gmi:platform->eos:EOS_Platform->gmi:description
        $gmi_MI_Acquis_platform_EOS_Platform_description_node = $dom->createElement(
            'gmi:description'
        );
        //gmi:platform->eos:EOS_Platform->gmi:instrument
        $gmi_MI_Acquis_platform_EOS_Platform_instrument_node = $dom->createElement(
            'gmi:instrument'
        );
        //gmi:platform->eos:EOS_Platform->eos:otherProperty
        $gmi_MI_Acquis_platform_EOS_Platform_otherProperty_node = $dom->createElement(
            'eos:otherProperty'
        );

        //------******6******------//
        //gmi:platform->eos:EOS_Platform->gmi:identifier->gmd:MD_Identifier
        $gmi_MI_Acquis_platform_EOS_Platform_identifier_MD_Identifier_node = $dom->createElement(
            'gmd:MD_Identifier'
        );
        //gmi:platform->eos:EOS_Platform->gmi:description->gco:CharacterString
        $gmi_MI_Acquis_platform_EOS_Platform_description_String_node = $dom->createElement(
            'gco:CharacterString'
        );
        //gmi:platform->eos:EOS_Platform->gmi:instrument->eos:EOS_Instrument
        $gmi_MI_Acquis_platform_EOS_Platform_instrument_EOS_Instrument_node = $dom->createElement(
            'eos:EOS_Instrument'
        );
        //gmi:platform->eos:EOS_Platform->eos:otherProperty->gco:Record
        $gmi_MI_Acquis_platform_EOS_Platform_otherProperty_Record_node = $dom->createElement(
            'gco:Record'
        );

        //------******7******------//
        //gmi:platform->eos:EOS_Platform->gmi:identifier->gmd:MD_Identifier->gmd:code
        $gmi_MI_Acquis_platform_EOS_Platform_identifier_MD_Identifier_code_node = $dom->createElement(
            'gmd:code'
        );
        //gmi:platform->eos:EOS_Platform->gmi:identifier->gmd:MD_Identifier->gmd:description
        $gmi_MI_Acquis_platform_EOS_Platform_identifier_MD_Identifier_description_node = $dom->createElement(
            'gmd:description'
        );

        //gmi:platform->eos:EOS_Platform->gmi:instrument->eos:EOS_Instrument->gmi:citation
        $gmi_MI_Acquis_platform_EOS_Platform_instrument_EOS_Instrument_citation_node = $dom->createElement(
            'gmi:citation'
        );
        //gmi:platform->eos:EOS_Platform->gmi:instrument->eos:EOS_Instrument->gmi:identifier
        $gmi_MI_Acquis_platform_EOS_Platform_instrument_EOS_Instrument_identifier_node = $dom->createElement(
            'gmi:identifier'
        );
        //gmi:platform->eos:EOS_Platform->gmi:instrument->eos:EOS_Instrument->gmi:type
        $gmi_MI_Acquis_platform_EOS_Platform_instrument_EOS_Instrument_type_node = $dom->createElement(
            'gmi:type'
        );
        //gmi:platform->eos:EOS_Platform->gmi:instrument->eos:EOS_Instrument->gmi:description
        $gmi_MI_Acquis_platform_EOS_Platform_instrument_EOS_Instrument_description_node = $dom->createElement(
            'gmi:description'
        );
        //gmi:platform->eos:EOS_Platform->gmi:instrument->eos:EOS_Instrument->eos:otherPropertyType
        $gmi_MI_Acquis_platform_EOS_Platform_instrument_EOS_Instrument_otherPropertyType_node = $dom->createElement(
            'eos:otherPropertyType'
        );
        //gmi:platform->eos:EOS_Platform->gmi:instrument->eos:EOS_Instrument->eos:otherProperty
        $gmi_MI_Acquis_platform_EOS_Platform_instrument_EOS_Instrument_otherProperty_node = $dom->createElement(
            'eos:otherProperty'
        );

        //gmi:platform->eos:EOS_Platform->gmi:instrument->eos:EOS_Instrument->eos:sensor
        $gmi_MI_Acquis_platform_EOS_Platform_instrument_EOS_Instrument_otherProperty_node = $dom->createElement(
            'eos:sensor'
        );

        //gmi:platform->eos:EOS_Platform->eos:otherProperty->gco:Record->eos:AdditionalAttributes
        $gmi_MI_Acquis_platform_EOS_Platform_otherProperty_Record_AdditionalAttributes_node = $dom->createElement(
            'eos:AdditionalAttributes'
        );

        //------******8******------//
        //gmi:platform->eos:EOS_Platform->gmi:identifier->gmd:MD_Identifier->gmd:code->gco:CharacterString
        $gmi_MI_Acquis_platform_EOS_Platform_identifier_MD_Identifier_code_String_node = $dom->createElement(
            'gco:CharacterString',
            $o_PLATFORM
        );

        //gmi:platform->eos:EOS_Platform->gmi:identifier->gmd:MD_Identifier->gmd:description->gco:CharacterString
        $gmi_MI_Acquis_platform_EOS_Platform_identifier_MD_Identifier_description_String_node = $dom->createElement(
            'gco:CharacterString'
        );

        /* 
        $_node = $dom->createElement(');
        $_node ->appendChild();
        $_CodeList = new DOMAttr();
        $_Value = new DOMAttr();
        $_node ->setAttributeNode();
       */

        //----L7----
        $gmi_MI_Acquis_operation_MI_Operation_identifier_MD_Identifier_code_node->appendChild(
            $gmi_MI_Acquis_operation_MI_Operation_identifier_MD_Identifier_code_String_node
        );

        $gmi_MI_Acquis_platform_EOS_Platform_identifier_MD_Identifier_code_node->appendChild(
            $gmi_MI_Acquis_platform_EOS_Platform_identifier_MD_Identifier_code_String_node
        );
        $gmi_MI_Acquis_platform_EOS_Platform_identifier_MD_Identifier_description_node->appendChild(
            $gmi_MI_Acquis_platform_EOS_Platform_identifier_MD_Identifier_description_String_node
        );

        // $gmi_MI_Acquis_platform_EOS_Platform_instrument_EOS_Instrument_citation_node->appendChild();
        // $gmi_MI_Acquis_platform_EOS_Platform_instrument_EOS_Instrument_identifier_node->appendChild();
        // $gmi_MI_Acquis_platform_EOS_Platform_instrument_EOS_Instrument_type_node->appendChild();
        // $gmi_MI_Acquis_platform_EOS_Platform_instrument_EOS_Instrument_description_node->appendChild();
        // $gmi_MI_Acquis_platform_EOS_Platform_instrument_EOS_Instrument_otherPropertyType_node->appendChild();
        // $gmi_MI_Acquis_platform_EOS_Platform_instrument_EOS_Instrument_otherProperty_node->appendChild();
        // $gmi_MI_Acquis_platform_EOS_Platform_instrument_EOS_Instrument_otherProperty_node->appendChild();

        //----L6----
        $gmi_MI_Acquis_operation_MI_Operation_identifier_MD_Identifier_node->appendChild(
            $gmi_MI_Acquis_operation_MI_Operation_identifier_MD_Identifier_code_node
        );

        $gmi_MI_Acquis_platform_EOS_Platform_identifier_MD_Identifier_node->appendChild(
            $gmi_MI_Acquis_platform_EOS_Platform_identifier_MD_Identifier_code_node
        );
        $gmi_MI_Acquis_platform_EOS_Platform_identifier_MD_Identifier_node->appendChild(
            $gmi_MI_Acquis_platform_EOS_Platform_identifier_MD_Identifier_description_node
        );

        $gmi_MI_Acquis_platform_EOS_Platform_instrument_EOS_Instrument_node->appendChild(
            $gmi_MI_Acquis_platform_EOS_Platform_instrument_EOS_Instrument_citation_node
        );
        $gmi_MI_Acquis_platform_EOS_Platform_instrument_EOS_Instrument_node->appendChild(
            $gmi_MI_Acquis_platform_EOS_Platform_instrument_EOS_Instrument_identifier_node
        );
        $gmi_MI_Acquis_platform_EOS_Platform_instrument_EOS_Instrument_node->appendChild(
            $gmi_MI_Acquis_platform_EOS_Platform_instrument_EOS_Instrument_type_node
        );
        $gmi_MI_Acquis_platform_EOS_Platform_instrument_EOS_Instrument_node->appendChild(
            $gmi_MI_Acquis_platform_EOS_Platform_instrument_EOS_Instrument_description_node
        );
        $gmi_MI_Acquis_platform_EOS_Platform_instrument_EOS_Instrument_node->appendChild(
            $gmi_MI_Acquis_platform_EOS_Platform_instrument_EOS_Instrument_otherPropertyType_node
        );
        $gmi_MI_Acquis_platform_EOS_Platform_instrument_EOS_Instrument_node->appendChild(
            $gmi_MI_Acquis_platform_EOS_Platform_instrument_EOS_Instrument_otherProperty_node
        );
        $gmi_MI_Acquis_platform_EOS_Platform_instrument_EOS_Instrument_node->appendChild(
            $gmi_MI_Acquis_platform_EOS_Platform_instrument_EOS_Instrument_otherProperty_node
        );

        $gmi_MI_Acquis_platform_EOS_Platform_otherProperty_Record_node->appendChild(
            $gmi_MI_Acquis_platform_EOS_Platform_otherProperty_Record_AdditionalAttributes_node
        );
        //----L5----
        $gmi_MI_Acquis_operation_MI_Operation_description_node->appendChild(
            $gmi_MI_Acquis_operation_MI_Operation_description_String_node
        );
        $gmi_MI_Acquis_operation_MI_Operation_identifier_node->appendChild(
            $gmi_MI_Acquis_operation_MI_Operation_identifier_MD_Identifier_node
        );

        $gmi_MI_Acquis_platform_EOS_Platform_identifier_node->appendChild(
            $gmi_MI_Acquis_platform_EOS_Platform_identifier_MD_Identifier_node
        );
        $gmi_MI_Acquis_platform_EOS_Platform_description_node->appendChild(
            $gmi_MI_Acquis_platform_EOS_Platform_description_String_node
        );
        $gmi_MI_Acquis_platform_EOS_Platform_instrument_node->appendChild(
            $gmi_MI_Acquis_platform_EOS_Platform_instrument_EOS_Instrument_node
        );
        $gmi_MI_Acquis_platform_EOS_Platform_otherProperty_node->appendChild(
            $gmi_MI_Acquis_platform_EOS_Platform_otherProperty_Record_node
        );

        //----L4----
        $gmi_MI_Acquis_operation_MI_Operation_node->appendChild(
            $gmi_MI_Acquis_operation_MI_Operation_description_node
        );
        $gmi_MI_Acquis_operation_MI_Operation_node->appendChild(
            $gmi_MI_Acquis_operation_MI_Operation_identifier_node
        );
        $gmi_MI_Acquis_operation_MI_Operation_node->appendChild(
            $gmi_MI_Acquis_operation_MI_Operation_status_node
        );
        $gmi_MI_Acquis_operation_MI_Operation_node->appendChild(
            $gmi_MI_Acquis_operation_MI_Operation_parentOperation_node
        );

        $gmi_MI_Acquis_platform_EOS_Platform_node->appendChild(
            $gmi_MI_Acquis_platform_EOS_Platform_identifier_node
        );
        $gmi_MI_Acquis_platform_EOS_Platform_node->appendChild(
            $gmi_MI_Acquis_platform_EOS_Platform_description_node
        );
        $gmi_MI_Acquis_platform_EOS_Platform_node->appendChild(
            $gmi_MI_Acquis_platform_EOS_Platform_instrument_node
        );
        $gmi_MI_Acquis_platform_EOS_Platform_node->appendChild(
            $gmi_MI_Acquis_platform_EOS_Platform_otherProperty_node
        );
        //----L3----
        $gmi_MI_Acquis_operation_node->appendChild(
            $gmi_MI_Acquis_operation_MI_Operation_node
        );
        $gmi_MI_Acquis_platform_node->appendChild(
            $gmi_MI_Acquis_platform_EOS_Platform_node
        );
        //----L2----
        $gmi_MI_AcquisitionInformation_node->appendChild(
            $gmi_MI_Acquis_operation_node
        );
        $gmi_MI_AcquisitionInformation_node->appendChild(
            $gmi_MI_Acquis_platform_node
        );
        //----L1----
        $gmiAcquisitionInformation_node->appendChild(
            $gmi_MI_AcquisitionInformation_node
        );
        //----L0----
        $root->appendChild($gmiAcquisitionInformation_node);

        //----ROOT--------ROOT--------ROOT--------ROOT----
        //appendChild $root
        $dom->appendChild($root);
        // save data
        $dom->save($xml_file_name);
        echo "$xml_file_name has been successfully created and saved";
        // }

