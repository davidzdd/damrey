<?php
/**
 * 前台分页系统
 */
class Pager {
    
    /**
     * 获取新的分页系统
     *
     * @param int $currentPage 当前页
     * @param int $totalCount   总个数
     * @param int $perPage     每页显示记录数
     * @param String $url      页面跳转URL
     * @param String $tip 分页条显示信息（例如：共多少页....）
     * @param int $pageLength    前后（包括当前页）显示几页
     * @param String $css 样式名称
     * 
     * @return html
     */
    public static function getPager ($currentPage, $totalCount, $perPage, $url, $tip='' ,$pageLength = '5', $css = 'page', $paramName='page') {
        $totalPages = ceil($totalCount / $perPage); //总页数
        $html = '';
        $html .= '<div id="' . $css . '">';
        if ($totalPages > 0 && $currentPage <= $totalPages) {
	        $tip = trim($tip);
	        $html .= $tip ?  $tip : '';
            $currentPage = ($currentPage) ? $currentPage : 1;
            
            $html .= self::getPrevious($currentPage, $url, $paramName);
            $html .= self::getPages($currentPage, $url, $pageLength, $totalPages, $paramName);
            $html .= self::getNext($currentPage, $url, $totalPages, $paramName);
        
        }
        $html .= '</div>';
        return $html;
    }

    private static function getPrevious ($currentPage, $url, $paramName='page') {
        $html = '';
        $prePage = $currentPage - 1;
        if ($prePage > 0) {
            $upUrl = self::getPageUrl($url, $prePage, $paramName);
            $html .= '<a href="' . $upUrl . '">上一页</a>';
        }
        return $html;
    }

    private static function getPages ($currentPage, $url, $pageLength, $totalPages, $paramName='page') {
        $html = '';
        $space = floor($pageLength / 2);
        //确认分页中start page
        $start = 1;
        $sufEndTemp = $currentPage + $space;
        if ($sufEndTemp > $totalPages) {
            $space = $space + ($sufEndTemp - $totalPages);
        }
        $preStartTemp = $currentPage - $space;
        if ($preStartTemp > 0) {
            $start = $preStartTemp;
        }
        //确认分页中end page
        $end = $start + $pageLength - 1;
        if ($end > $totalPages) {
            $end = $totalPages;
        }
        
        if ($start > 1) {
            //显示第一页的分页信息
            $pageUrl = self::getPageUrl($url, 1, $paramName);
            $html .= '<a href="' . $pageUrl . '">1..</a>';
        }
        for ($i = $start; $i <= $end; $i++) {
            $pageUrl = self::getPageUrl($url, $i, $paramName);
            $class = ($i == $currentPage)? 'class="current"':'';
            $html .= '<a '. $class .'href="' . $pageUrl . '">' . $i . '</a>';
        }
        if ($end < $totalPages) {
            //显示第一页的分页信息
            $pageUrl = self::getPageUrl($url, $totalPages, $paramName);
            $html .= '<a href="' . $pageUrl . '">..' . $totalPages . '</a>';
        }
        return $html;
    }

    private static function getNext ($currentPage, $url, $totalPages, $paramName='page') {
        $html = '';
        if (($currentPage - $totalPages) < 0) {
            $downUrl = self::getPageUrl($url, $currentPage + 1, $paramName);
            $html .= '<a  class="nextpage" href="' . $downUrl . '">下一页</a>';
        }
        return $html;
    }

    private static function getPageUrl ($url, $pageNo, $paramName='page') {
        return $url . '&'.$paramName.'=' . $pageNo;
    }

}
?>