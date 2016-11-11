<?php

namespace Ojs\CoreBundle\Helper;


class CitationHelper
{

    public function risExporter()
    {
        # Content-Disposition:attachment; filename="doi.ris"
        # Content-Type:application/x-research-info-systems; charset=UTF-8
    }

    public function endNoteExporter()
    {
        # Content-Disposition:attachment; filename="doi.enw"
        # Content-Type:application/x-endnote-refer; charset=UTF-8
    }

    public function pubmedXmlExporter($articles)
    {

        $output = '<?xml version="1.0" encoding="UTF-8"?>';
        $output = '<!DOCTYPE ArticleSet PUBLIC "-//NLM//DTD PubMed 2.0//EN" "http://www.ncbi.nlm.nih.gov:80/entrez/query/static/PubMed.dtd">';
        $output .= '<ArticleSet>';
        foreach ($articles as $article) {
            $output .= '<Article>';
            $output .= '<Journal>';
            $output .= '<PublisherName>NWSA</PublisherName>';
            $output .= '<JournalTitle>Ecological Life Sciences</JournalTitle>';
            $output .= '<Issn>1308 7258</Issn><Volume>11</Volume><Issue>4</Issue>';
            $output .= '<PubDate PubStatus="epublish"><Year>2016</Year><Month>10</Month><Day>13</Day></PubDate>';
            $output .= '</Journal>';
            $output .= '<ArticleTitle>ON THE OCCURENCE OF JUVENILES AND EGG CAPSULES OF SCYLIORHINUS CANıCULA FROM THE NORTH-EASTERN MEDıTERRANEAN SEA</ArticleTitle>';
            $output .= '<FirstPage>28</FirstPage><LastPage>32</LastPage>';
            $output .= '<Language>EN</Language>';
            $output .= '<AuthorList>';

            $output .= '<Author><FirstName>EBRU</FirstName><MiddleName>İFAKAT</MiddleName><LastName>ÖZCAN</LastName>';
            $output .= '<Affiliation>TUNCELİ ÜNİVERSİTESİ PERTEK SAKİNE GENÇ MESLEK YÜKSEKOKULU SU ÜRÜNLERİ İŞLEME BÖLÜMÜ. ebru2385@hotmail.com</Affiliation>';
            $output .= '</Author>';

            $output .= '</AuthorList>';

            $output .= '<History>';
            $output .= '<PubDate PubStatus="received"><Year>2016</Year><Month>09</Month><Day>06</Day></PubDate>';
            $output .= '<PubDate PubStatus="accepted"><Year>2016</Year><Month>10</Month><Day>18</Day></PubDate>';
            $output .= '<PubDate PubStatus="revised"><Year>2016</Year><Month>10</Month><Day>18</Day></PubDate>';
            $output .= '</History>';

            $output .= '<Abstract>Juveniles and egg capsules of smallspotted catshark Scyliorhinus canicula were obtained as by-catch from a commercial trawl fishing at depts between 300-398 m in the North-eastern Mediterranean Sea. Egg capsules and juveniles of S. canicula were identified for the first time in the this region.</Abstract>';

            $output .= '</Article>';

        }
        $output .= '</ArticleSet>';
        return $output;
    }

    public function jatsExporter()
    {
    }

    public function bibtexExporter(){
        # Application/X-Bibtex; charset=UTF-8
    }
}