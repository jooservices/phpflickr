<?php

namespace Jooservices\PhpFlickr;

class InterestingnessApi extends ApiMethodGroup
{

    /**
     * Returns the list of interesting photos for the most recent day or a
     * user-specified date.
     *
     * This method does not require authentication.
     *
     * @link https://www.flickr.com/services/api/flickr.interestingness.getList.html
     * @param string $date A specific date, formatted as YYYY-MM-DD, to return
     * interesting photos for.
     * @param string $extras A comma-delimited list of extra information to fetch for
     * each returned record. Currently supported fields are: <code>description</code>,
     * <code>license</code>, <code>date_upload</code>, <code>date_taken</code>,
     * <code>owner_name</code>, <code>icon_server</code>, <code>original_format</code>,
     * <code>last_update</code>, <code>geo</code>, <code>tags</code>,
     * <code>machine_tags</code>, <code>o_dims</code>, <code>views</code>,
     * <code>media</code>, <code>path_alias</code>, <code>url_sq</code>,
     * <code>url_t</code>, <code>url_s</code>, <code>url_q</code>, <code>url_m</code>,
     * <code>url_n</code>, <code>url_z</code>, <code>url_c</code>, <code>url_l</code>,
     * <code>url_o</code>
     * @param string $perPage Number of photos to return per page. If this argument is
     * omitted, it defaults to 100. The maximum allowed value is 500.
     * @param string $page The page of results to return. If this argument is omitted,
     * it defaults to 1.
     * @return
     */
    public function getList($date = null, $extras = null, $perPage = null, $page = null)
    {
        $params = [
            'date' => $date,
            'extras' => $extras,
            'per_page' => $perPage,
            'page' => $page
        ];
        return $this->flickr->request('flickr.interestingness.getList', $params);
    }
}
