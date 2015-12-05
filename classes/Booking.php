<?php

class Booking
{
    /*
     * url: http://www.booking.com/searchresults.html
     * method: get
     */
    private $SEARCH_GET_URL     = "http://www.booking.com/searchresults.html";
    private $SEARCH_GET_PARAMS  = array(
//        'label' => 'gen173nr-17CAEoggJCAlhYSDNiBW5vcmVmaGiIAQGYATG4AQTIAQTYAQHoAQH4AQI;sid=e8f0307e36818f9c7640b6e451ce44bd;dcid=4;checkin_monthday=25',
        'checkin_year_month' => '2015-12',
        'checkout_monthday' =>	27,
        'checkout_year_month' => '2015-12',
        'dest_id' => '-2679652',
        'dest_type'	=> 'city',
//        'dtdisc' =>	0,
        'group_adults' => 2,
        'group_children' =>	0,
//        'hlrd' => 0,
//        'hyb_red' => 0,
//        'inac' => 0,
//        'label_click' => 'undef',
//        'nha_red' => 0,
        'no_rooms' => 1,
//        'offset' => 0,
//        'offset_unavail' =>	1,
//        'redirected_from_city' => 0,
//        'redirected_from_landmark' => 0,
//        'redirected_from_region' =>	0,
//        'review_score_group' =>	'empty',
//        'room1' => 'A,A',
//        'sb_price_type'	=> 'total',
//        'score_min' => 0
//        'si' =>	'ai,co,ci,re,di',
//        'src' => 'index',
//        'ss' => 'Jakarta, Jakarta Province, Indonesia',
//        'ss_all' => 0,
//        'ss_raw' =>	'jakar',
//        'ssb' => 'empty',
//        'sshis' => 0,
        'rows' => 15
    );
    private $SEARCH_GET_CURL_OPT = array(
        CURLOPT_USERAGENT => 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en; rv:1.9.2.13) Gecko/20101203 Firefox/3.6.13',
        CURLOPT_RETURNTRANSFER => TRUE,
        CURLOPT_FOLLOWLOCATION => TRUE,
        CURLOPT_VERBOSE => FALSE,
        CURLOPT_POST => FALSE
    );

    public function get_search_get_curl_opt($num_of_pages) {
        $opts = array();

        for($i=0; $i<$num_of_pages; $i++) {
            $params = $this->SEARCH_GET_PARAMS;
            $params['offset'] = $i * 15;

            $post_fields = http_build_query($params);
            $opt = $this->SEARCH_GET_CURL_OPT;
            $opt[CURLOPT_URL] = $this->SEARCH_GET_URL . "?" . $post_fields;

            $opts[$i] = $opt;
        }

        return $opts;
    }

}