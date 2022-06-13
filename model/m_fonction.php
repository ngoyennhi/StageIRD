<?php
 /*********************************  
                     Bloc: Functions
         ********************************/
        /**
         * check_mdp_format/ check_user_format
         * password includes A-Z or a-z or 0-9 only
         * user includes A-Z or a-z or 0-9 only
         */
        function check_user_format($mdp)
        {
            $majuscule = preg_match('@[A-Z]@', $mdp);
            $minuscule = preg_match('@[a-z]@', $mdp);
            $chiffre = preg_match('@[0-9]@', $mdp);
            
            if(!$majuscule || !$minuscule || !$chiffre || strlen($mdp) < 4)
            {
                return false;
            }
            else 
                return true;
        };

        function check_mdp_format($mdp)
        {
            $majuscule = preg_match('@[A-Z]@', $mdp);
            $minuscule = preg_match('@[a-z]@', $mdp);
            $chiffre = preg_match('@[0-9]@', $mdp);
            
            if(!$majuscule || !$minuscule || !$chiffre || strlen($mdp) < 4)
            {
                return false;
            }
            else 
                return true;
        };

        function before ($char, $string){
            return substr($string, 0, strpos($string, $char,));
           };
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
       /**
        * function add Keyword for a NODE
        */
       function addKeyword($dom,$node,$keyword,$lib_thesaurus){
           // $lib_thesaurus = array(
           // array("Land cover" => "https://gcmd.earthdata.nasa.gov/kms/concept/e5815f58-8232-4c7f-b50d-ea71d73891a9"),
           // array("Sentinel - 2" =>"https://gcmd.earthdata.nasa.gov/kms/concept/2ce20983-98b2-40b9-bb0e-a08074fb93b3"),
           // array("Land cover classification" => "https://gcmd.earthdata.nasa.gov/kms/concept/75c312bc-79f9-4d74-a7c0-3c67c019196c"), 
           // );
           $keyword_node = addLevel1($dom,$node[0],'gmd:keyword','gmx:Anchor',$keyword);
           foreach ($lib_thesaurus as $aValue) {
               foreach ($aValue as $key => $value) {
                   if ($key == $keyword) {
                         addAttr($keyword_node[1],"xlink:href",$value);
                    }
               }
           }
       }