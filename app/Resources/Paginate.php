<?php

namespace App\Resources;

class Pagination{

    private $per_page;
    private $total_rec;
    private $total_pages;
    private $page;
    private $start_page;

    public function paginate($source, $per_page)
    {
        $this->per_page = $per_page;
        $this->total_rec = count($source);
        $this->total_pages = ceil($this->total_rec / $this->per_page);
        $this->page = $this->setThisPage();
        $this->start_page = ($this->page -1) * $this->per_page;

        $keys = array_slice(array_keys($source), $this->start_page, $this->per_page);
        $values = array_slice(array_values($source), $this->start_page, $this->per_page);
        return array_combine($keys, $values);
    }

    public function render()
    {
        return "<nav>
                    <ul class='pager'>
                        <li>{$this->back()}</li>
                        <li>{$this->curent()}</li>
                        <li>{$this->fwd()}</li>
                    </ul>
                </nav>";
    }

    private function back()
    {
        if($this->page > 3 && $this->total_pages > 5){
            return '<a style="text-decoration:none;" href="/stat/?page=' . ($this->page - 1) .'">&lt;</a>
                    <a style="text-decoration:none;" href="/stat/?page=1">1</a> '
                    .$this->set_dots_left();
        }else{
            return '&nbsp;';
        }
    }

    private function curent()
    {
        $link = null;
        if($this->total_pages != 1){
            //for($pages = 1; $pages <= $this->total_pages; $pages++){
            foreach($this->set_total_partial_pages() as $pages){
                if($this->page == $pages){
                    $link .= " <a href='/stat/?page={$this->page}'><b>{$this->page}</b></a> ";
                }else{
                    $link .= "<a href='/stat/?page={$pages}'>{$pages}</a>";
                }
            }
        }
        return $link;
    }

    private function fwd()
    {
        if($this->start_page + $this->per_page < $this->total_rec && $this->total_pages > 5 && $this->page < $this->total_pages - 2){
            return $this->set_dots_right()
                   .' <a style="text-decoration:none;" href="/stat/?page=' . $this->total_pages . '">'.$this->total_pages.'</a>
                      <a style="text-decoration:none;" href="/stat/?page=' . ($this->page + 1) . '">&gt;</a>';
        }else{
            return '&nbsp;';
        }
    }

    private function setThisPage()
    {
       if ($this->total_pages == 0) {
           $this->page = 1;
       } elseif (isset($_GET['page'])) {
           $this->page = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_NUMBER_INT);
           if($this->page > $this->total_pages || $this->page === 0 || $this->page == 0){
               $this->page = 1;
           }
       } else {
           $this->page = 1;
       }
       return $this->page;
    }

    public function count_page()
    {
        if($this->total_pages != 1){
            $count = '<p style="float:right;margin:0;font-size:1.1em;">[ ';
            $count .= $this->start_page + 1;
            if ($this->start_page + 1 < $this->total_rec) {
                $count .= ' to ';
                if ($this->start_page + $this->per_page < $this->total_rec) {
                    $count .= $this->start_page + $this->per_page;
                } else {
                    $count .= $this->total_rec;
                }
            }
            $count .= " of $this->total_rec ";
            $count .= ']</p>';
            return $count;
        }
    }

    private function set_total_partial_pages()
    {
        $total = 5; $array_pages = [];
        $start = $this->page < 4 ? 0 : $this->page - 3;

        for($pages = 1; $pages <= $this->total_pages; $pages++){
            $array_pages[] = $pages;
        }
        $result_pages = ($this->page > $this->total_pages - 2) ? //$result_pages < 5
                            array_slice($array_pages, $start-1, $total+1) :
                        ($this->page == $this->total_pages) ? //$result_pages) < 4
                            array_slice($array_pages, -5, $total) ://array_slice($array_pages, $start-2, $total);
                        array_slice($array_pages, $start, $total);
        return $result_pages;
    }

    private function set_dots_left()
    {
        if($this->page > 4){
            return "...";
        }
    }

    private function set_dots_right()
    {
        if($this->page < $this->total_pages - 3){
            return "...";
        }
    }
}
