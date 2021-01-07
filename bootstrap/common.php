<?php

    function operation($success=false,$msg='操作'){

        if ($success) {
            session()->flash("data",['class' => 'success','msg' => $msg.'成功']);
        }else{
            session()->flash("data",['class' => 'danger','msg' => $msg.'失败']);
        }
    }

    //富文本编辑器图片删除
    function imgPathdel($count,$imgPath,$data=''){
//          /<img src="\/uploads\/(.*?)"\/>/
            preg_match_all('/<img[^>]+src=[\'"]([^\'"]+)[\'"]/',$imgPath,$list);

            for ($i=0;$i < $count;$i++){

                if ($imgPath != '' && strpos($data,$list[1][$i]) === false) {
                    $list[1][$i] = substr($list[1][$i],9);
                    Storage::delete($list[1][$i]);

                }

            }

    }

    //获取所有子类
    function del($array,$id){
        $arr = [];
        foreach ($array as $key => $item) {
            if ($item['pid'] == $id) {
                $arr[] = $item;
                $arr = array_merge($arr,del($array,$item['id']));//合并数组，将子类的id数据合并在一次
            }
        }
        return $arr;
    }

?>
