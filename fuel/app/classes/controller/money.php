<?php

class Controller_Money extends Controller_Template
{
    public $template = 'money/template';

    public function action_top()
    {
        $this->template->title = "Top";
        $this->template->username = "トップです";
        $this->template->content = View::forge('money/top');
    }

    public function action_data()
    {
        $in_category = DB::select('in_category', DB::expr('sum(`in_price`)'), 'color')->from('income')->group_by('in_category')->join('in_category', 'left outer')->on('income.in_category', '=', 'in_category.category')->where('in_date', '>=', date('Y/m/1'))->order_by('sum(`in_price`)', 'desc')->execute()->as_array();
        foreach ($in_category as $in) {
            $result['in_category'][] = $in['in_category'];
            $result['income'][] = $in['sum(`in_price`)'];
            $result['in_color'][] = $in['color'];
        }
        $out_category = DB::select('out_category', DB::expr('sum(`out_price`)'), 'color')->from('outcome')->group_by('out_category')->join('out_category', 'left outer')->on('outcome.out_category', '=', 'out_category.category')->where('out_date', '>=', date('Y/m/1'))->order_by('sum(`out_price`)', 'desc')->execute()->as_array();
        foreach ($out_category as $out) {
            $result['out_category'][] = $out['out_category'];
            $result['outcome'][] = $out['sum(`out_price`)'];
            $result['out_color'][] = $out['color'];
        }
        $this->template->title = "Data";
        $this->template->username = "Money User";
        $this->template->content = View::forge('money/data', @$result);
    }


    public function action_record()
    {
        $income = DB::select()->from('in_category');
        $outcome = DB::select()->from('out_category');
        $result['income'] = $income->execute()->as_array();
        $result['outcome'] = $outcome->execute()->as_array();

        $this->template->title = "Record";
        $this->template->username = "Money User";
        $this->template->content = View::forge('money/record', $result);
    }

    public function action_result()
    {
        if (Input::method() == 'POST') {
            $data = array();
            if (Input::post('income')) {
                $data['in_date'] = Input::post('in_date');
                $data['in_price'] = Input::post('in_price');
                $data['in_category'] = Input::post('in_category');
                $data['in_memo'] = Input::post('in_memo');
                $post = Model_Income::forge();
                $post->set($data);
                $post->save();
            } elseif (Input::post('outcome')) {
                $data['out_date'] = Input::post('out_date');
                $data['out_price'] = Input::post('out_price');
                $data['out_category'] = Input::post('out_category');
                $data['out_memo'] = Input::post('out_memo');
                $post = Model_Outcome::forge();
                $post->set($data);
                $post->save();
            } else {
                Log::error('正常に処理されていません。');
            }        
        } else {
            Log::error("ダメです。");
        }
        
        
        $this->template->title = "Result";
        $this->template->username = "結果くん";
        
        $this->template->content = View::forge('money/result', $data);
    }

    public function action_edit()
    {
        $r = array();
        if (Input::method() == 'POST') {
            if (Input::post('in_add_name') || Input::post('out_add_name')) {
                $r['respond'] = $this->add_Item();
            } elseif (Input::post('in_edit') || Input::post('out_edit')) {
                $r['respond'] = $this->edit_Item();
            } elseif (Input::post('in_delete') || Input::post('out_delete')) {
                $r['respond'] = $this->delete_Item();
            } else {
                //何かする
            }
        }

        $r['income_category'] = DB::select()->from('in_category')->execute()->as_array();
        $r['outcome_category'] = DB::select()->from('out_category')->execute()->as_array();

        $this->template->title = "Edit";
        $this->template->username = "編集くん";
        $this->template->content = View::forge('money/edit', $r);
    }

    private function add_Item()
    {
        if (Input::post('in_add_name')) {
            $check = DB::select()->from('in_category')->where('category', '=', Input::post('in_add_name'));
            $check_result = $check->execute()->as_array();
            if (empty($check_result)) {
                $query = DB::insert('in_category')->set(array(
                    'category' => Input::post('in_add_name'),
                    'color' => Input::post('in_add_color')
                ));
                $result = $query->execute();
                $respond = "追加で登録されました。";
            } else {
                $respond = "既に登録されています。";
            }
            $respond = "「".Input::post('in_add_name')."」は".$respond;
        }

        if (Input::post('out_add_name')) {
            $check = DB::select()->from('out_category')->where('category', '=', Input::post('out_add_name'));
            $check_result = $check->execute()->as_array();
            if (empty($check_result)) {
                $query = DB::insert('out_category')->set(array(
                    'category' => Input::post('out_add_name'),
                    'color' => Input::post('out_add_color')
                ));
                $result = $query->execute();
                $respond = "追加で登録されました。";
            } else {
                $respond = "既に登録されています。";
            }
            $respond = "「".Input::post('out_add_name')."」は".$respond;
        }

        return $respond;
    }

    private function edit_Item()
    {
        if (Input::post('in_edit_name')) {
            $query = DB::update('in_category')
                ->value('category', Input::post('in_edit_name'))
                ->where('category', '=', Input::post('in_edit'));
            $result = $query->execute();
            $respond = Input::post('in_edit')."は正常に".Input::post('in_edit_name')."に編集されました。";
        }

        if (Input::post('out_edit_name')) {
            $query = DB::update('out_category')
                ->value('category', Input::post('out_edit_name'))
                ->where('category', '=', Input::post('out_edit'));
            $result = $query->execute();
            $respond = Input::post('out_edit')."は正常に".Input::post('out_edit_name')."に編集されました。";
        }

        return $respond;
    }

    private function delete_Item()
    {
        if (Input::post('in_delete')) {
            $query = DB::delete('in_category')->where('category', '=', Input::post('in_delete'));
            $result = $query->execute();
            $respond = "「".Input::post('in_delete')."」は正常に削除されました。";
        }

        if (Input::post('out_delete')) {
            $query = DB::delete('out_category')->where('category', '=', Input::post('out_delete'));
            $result = $query->execute();
            $respond = "「".Input::post('out_delete')."」は正常に削除されました。";
        }

        return $respond;
    }
}