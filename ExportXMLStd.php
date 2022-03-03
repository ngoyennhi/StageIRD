<?php ini_set('display_errors', 'on'); ?>
        <?php
        include 'getStringXML.php';
        $dom = new DOMDocument();
        $dom->encoding = 'utf-8';
        $dom->xmlVersion = '1.0';
        $dom->formatOutput = true;
        $xml_file_name =
            'OSO_20200101_VECTOR_departement_01_V1-0_MTD_ALL_stdISO.xml';
        // If the $xml_file_name file in existing directory already exist, delete it by unlink()
        if (!unlink($xml_file_name)) {
            echo "$file_pointer cannot be deleted due to an error";
        } else {
            // START Un premier élément'gmi:Muscate_Metadata_Document'
           
            $root = $dom->createElement("gmi:".$o_Muscate_Metadata_Document);

            //set Attributs of élément 'gmi:Muscate_Metadata_Document'

            $attr_root_xsi = new DOMAttr(
                'xmlns:xsi', (String)$o_Muscate_Metadata_Document_DocNamespaces_xsi);
            $root->setAttributeNode($attr_root_xsi);

            $attr_root_xsi_noNamespaceSchemaLocation = new DOMAttr(
                'xsi:noNamespaceSchemaLocation', (String)$o_Muscate_Metadata_Document_xsi );
            $root->setAttributeNode($attr_root_xsi_noNamespaceSchemaLocation );

            // $attr_root_oes = new DOMAttr(
            //     'xmlns:eos',
            //     'http://earthdata.nasa.gov/schema/eos'
            // );
            // $root->setAttributeNode($attr_root_oes);

            // $attr_root_gco = new DOMAttr(
            //     'xmlns:gco',
            //     'http://www.isotc211.org/2005/gco'
            // );
            // $root->setAttributeNode($attr_root_gco);

            // $attr_root_gmd = new DOMAttr(
            //     'xmlns:gmd',
            //     'http://www.isotc211.org/2005/gmd'
            // );
            // $root->setAttributeNode($attr_root_gmd);

            // $attr_root_gml = new DOMAttr(
            //     'xmlns:gml',
            //     'http://www.opengis.net/gml/3.2'
            // );
            // $root->setAttributeNode($attr_root_gml);

            // $attr_root_gmi = new DOMAttr(
            //     'xmlns:gmi',
            //     'http://www.isotc211.org/2005/gmi'
            // );
            // $root->setAttributeNode($attr_root_gmi);

            // $attr_root_gmx = new DOMAttr(
            //     'xmlns:gmx',
            //     'http://www.isotc211.org/2005/gmx'
            // );
            // $root->setAttributeNode($attr_root_gmx);

            // $attr_root_gsr = new DOMAttr(
            //     'xmlns:gsr',
            //     'http://www.isotc211.org/2005/gsr'
            // );
            // $root->setAttributeNode($attr_root_gsr);

            // $attr_root_gss = new DOMAttr(
            //     'xmlns:gss',
            //     'http://www.isotc211.org/2005/gss'
            // );
            // $root->setAttributeNode($attr_root_gss);

            // $attr_root_gts = new DOMAttr(
            //     'xmlns:gts',
            //     'http://www.isotc211.org/2005/gts'
            // );
            // $root->setAttributeNode($attr_root_gts);

            // $attr_root_srv = new DOMAttr(
            //     'xmlns:srv',
            //     'http://www.isotc211.org/2005/srv'
            // );
            // $root->setAttributeNode($attr_root_srv);

            // $attr_root_swe = new DOMAttr(
            //     'xmlns:swe',
            //     'http://schemas.opengis.net/sweCommon/2.0/'
            // );
            // $root->setAttributeNode($attr_root_swe);

            // $attr_root_xlink = new DOMAttr(
            //     'xmlns:xlink',
            //     'http://www.w3.org/1999/xlink'
            // );
            // $root->setAttributeNode($attr_root_xlink);

            // $attr_root_xs = new DOMAttr(
            //     'xmlns:xs',
            //     'http://www.w3.org/2001/XMLSchema'
            // );
            // $root->setAttributeNode($attr_root_xs);

            // $attr_root_xsi = new DOMAttr(
            //     'xmlns:xsi',
            //     'http://www.w3.org/2001/XMLSchema-instance'
            // );
            // $root->setAttributeNode($attr_root_xsi);

            /*
             Data - NODEs and add node into its parent by appendChild
            */

            /*
            Bloc gmd:fileIdentifier
            */
            //gmd:fileIdentifier
            $gmdFileIdentifier_node = $dom->createElement('gmd:fileIdentifier');
            //gco:CharacterString
            $gcoCharacterString_node = $dom->createElement(
                'gco:CharacterString',
                $o_IDENTIFIER
            );
            $gmdFileIdentifier_node->appendChild($gcoCharacterString_node);
            $root->appendChild($gmdFileIdentifier_node);

            /*
            Bloc gmd:language
            */
            //gmd:language
            $gmdLanguage_node = $dom->createElement('gmd:language');
            //gco:CharacterString
            $gcoCharacterString_node = $dom->createElement(
                'gco:CharacterString',
                'eng'
            );
            $gmdLanguage_node->appendChild($gcoCharacterString_node);
            $root->appendChild($gmdLanguage_node);

            /*
            Bloc gmd:characterSet
            */
            //gmd:characterSet
            $gmdLanguage_node = $dom->createElement('gmd:characterSet');
            //gmd:MD_CharacterSetCode
            $gmdMD_CharacterSetCode_node = $dom->createElement(
                'gmd:MD_CharacterSetCode',
                'utf8'
            );
            $attr_MD_codeList = new DOMAttr(
                'codeList',
                'http://www.ngdc.noaa.gov/metadata/published/xsd/schema/resources/Codelist/gmxCodelists.xml#MD_CharacterSetCode'
            );
            $attr_MD_codeListValue = new DOMAttr('codeListValue', 'utf8');
            $gmdMD_CharacterSetCode_node->setAttributeNode($attr_MD_codeList);
            $gmdMD_CharacterSetCode_node->setAttributeNode(
                $attr_MD_codeListValue
            );
            $gmdLanguage_node->appendChild($gmdMD_CharacterSetCode_node);
            $root->appendChild($gmdLanguage_node);

            /*
            Bloc gmd:hierarchyLevel
            */
            //gmd:hierarchyLevel
            $gmdHierarchyLevel_node = $dom->createElement('gmd:hierarchyLevel');
            //gmd:MD_ScopeCode
            $gmdMD_ScopeCode_node = $dom->createElement(
                'gmd:MD_ScopeCode',
                'series'
            );
            $attr_MD_codeList = new DOMAttr(
                'codeList',
                'http://www.ngdc.noaa.gov/metadata/published/xsd/schema/resources/Codelist/gmxCodelists.xml#MD_ScopeCode'
            );
            $attr_MD_codeListValue = new DOMAttr('codeListValue', 'series');
            $gmdMD_ScopeCode_node->setAttributeNode($attr_MD_codeList);
            $gmdMD_ScopeCode_node->setAttributeNode($attr_MD_codeListValue);
            $gmdHierarchyLevel_node->appendChild($gmdMD_ScopeCode_node);
            $root->appendChild($gmdHierarchyLevel_node);

            /*
            Bloc gmd:contact
            */
            //gmd:contact
            $gmdContact_node = $dom->createElement('gmd:contact');
            $attr_Contact = new DOMAttr('gco:nilReason', 'missing');
            $gmdContact_node->setAttributeNode($attr_Contact);
            $root->appendChild($gmdContact_node);

            /*
            Bloc gmd:dateStamp
            */
            //gmd:dateStamp
            $gmdDateStamp_node = $dom->createElement('gmd:dateStamp');
            //gco:DateTime
            $gcoDateTime_node = $dom->createElement(
                'gco:DateTime',
                '2022-03-01'
            );
            $gmdDateStamp_node->appendChild($gcoDateTime_node);
            $root->appendChild($gmdDateStamp_node);

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
                'gmd:metadataStandardVersion'
            );
            //gco:CharacterString
            $gcoCharacterString = $dom->createElement(
                'gco:CharacterString',
                'ISO 19115-2:2009(E)'
            );
            $gmdMetadataStandardVersion_node->appendChild($gcoCharacterString);
            $root->appendChild($gmdMetadataStandardVersion_node);

            //appendChild $root
            $dom->appendChild($root);
            // save data
            $dom->save($xml_file_name);
            echo "$xml_file_name has been successfully created and saved";
        }

