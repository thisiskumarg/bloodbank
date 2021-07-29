<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Model extends CI_Model {

    function __construct() 
    {
        parent::__construct();
        $this->load->database();
    }

    public function hossignup()
    {
        $data['uname'] = $this->input->post('hn');
        $data['umobile'] = $this->input->post('hm');
        $data['uemail'] = $this->input->post('he');
        $data['upassword'] = $this->input->post('hp');
        $data['roleid'] = '1';

        if(!empty($data['uname']) && !empty($data['umobile']) && !empty($data['uemail']) && !empty($data['upassword']) && !empty($data['roleid']))
        {
            return $this->db->insert('user-details', $data);
        }
        else
        {
            return 0;
        }
    }

    public function recsignup()
    {
        $data['uname'] = $this->input->post('rn');
        $data['umobile'] = $this->input->post('rm');
        $data['uemail'] = $this->input->post('re');
        $data['upassword'] = $this->input->post('rp');
        $data['uage'] = $this->input->post('ra');
        $data['ublood-type'] = $this->input->post('rbg');
        $data['roleid'] = '2';

        if(!empty($data['uname']) && !empty($data['umobile']) && !empty($data['uemail']) && !empty($data['upassword']) 
        && !empty($data['uage']) && !empty($data['ublood-type']) && !empty($data['roleid']))
        {
            return $this->db->insert('user-details', $data);
        }
        else
        {
            return 0;
        }
    }

    public function signin()
    {
        $ue = $this->input->post('ue');
        $up = $this->input->post('up');

        if(!empty($ue) && !empty($up))
        {
            $sql1 = $this->db->get_where('user-details', array('uemail' => $ue))->result_array();
            if(!empty($sql1))
            {
                $sql2 = $this->db->get_where('user-details', array('uemail' => $ue, 'upassword' => $up))->result_array();
                if(!empty($sql2))
                {
                    foreach($sql2 as $row2)
                    {
                        $uid = $row2['uid'];
                        $roleid = $row2['roleid'];
                        return array('uid' => $uid, 'roleid' => $roleid);
                    }
                }
                else
                {
                    return 3;
                }
            }
            else
            {
                return 2;
            }
        }
        else
        {
            return 0;
        }
    }

    public function get_profile($uid)
    {
        return $this->db->get_where('user-details', array('uid' => $uid))->result_array();
    }

    public function editprofile($uid)
    {
        $data['uname'] = $this->input->post('ehn');
        $data['umobile'] = $this->input->post('ehm');
        $data['uemail'] = $this->input->post('ehe');

        if(!empty($data['uname']) && !empty($data['umobile']) && !empty($data['uemail']))
        {
            return $this->db->update('user-details', $data, array('uid' => $uid));
        }
        else
        {
            return 0;
        }
    }

    public function addblood($uid)
    {
        $data['btype'] = $this->input->post('bgh');
        $data['bquantity'] = $this->input->post('bqh');
        $data['blocation'] = $this->input->post('loch');
        $data['uid'] = $uid;

        if(!empty($data['btype']) && !empty($data['bquantity']) && !empty($data['blocation']) && !empty($data['uid']))
        {
            return $this->db->insert('blood-details', $data);
        }
        else
        {
            return 0;
        }
    }

    public function viewbloodform($uid)
    {
        return $this->db->get_where('blood-details', array('uid' => $uid, 'blood_del' => '0'))->result_array();
    }

    public function viewrequestsform($uid)
    {
        $this->db->select('requests.rid, user-details.uname, blood-details.btype, requests.blood_quantity, 
        user-details.umobile, user-details.uemail, requests.status');
        $this->db->from('requests');
        $this->db->join('blood-details', 'blood-details.bid = requests.bid');
        $this->db->join('user-details', 'user-details.uid = requests.userid');
        $this->db->where('blood-details.uid', $uid);
        return $this->db->get()->result_array();
    }

    public function index()
    {
        $this->db->select('user-details.uname, blood-details.btype, blood-details.bquantity, blood-details.blocation, 
        blood-details.bid');
        $this->db->from('blood-details');
        $this->db->join('user-details', 'user-details.uid = blood-details.uid');
        $this->db->where('blood-details.blood_del', 0);
        return $this->db->get()->result_array();
    }

    public function recrequests($uid)
    {
        $this->db->select('user-details.uname, blood-details.btype, blood-details.bquantity, blood-details.blocation, 
        requests.blood_quantity, requests.status, requests.rid');
        $this->db->from('requests');
        $this->db->join('blood-details', 'blood-details.bid = requests.bid');
        $this->db->join('user-details', 'user-details.uid = blood-details.uid');
        $this->db->where('requests.rec_del', 0);
        $this->db->where('requests.userid', $uid);
        return $this->db->get()->result_array();
    }

    public function bloodrequestform($bid)
    {
        $this->db->select('user-details.uname, blood-details.btype, blood-details.bquantity, blood-details.blocation, 
        blood-details.bid');
        $this->db->from('blood-details');
        $this->db->join('user-details', 'user-details.uid = blood-details.uid');
        $this->db->where('blood-details.bid', $bid);
        return $this->db->get()->result_array();
    }

    public function bloodrequest($uid, $bid)
    {
        $data['blood_quantity'] = $this->input->post('nbqr');
        $data['bid'] = $bid;
        $data['userid'] = $uid;

        if(!empty($data['blood_quantity']) && !empty($data['bid']) && !empty($data['userid']))
        {
            return $this->db->insert('requests', $data);
        }
        else
        {
            return 0;
        }
    }

    public function hastatus($rid)
    {
        $data['status'] = 1;
        return $this->db->update('requests', $data, array('rid' => $rid));
    }

    public function hdstatus($rid)
    {
        $data['status'] = 2;
        return $this->db->update('requests', $data, array('rid' => $rid));
    }

    public function delbloodinfo($bid)
    {
        $data['blood_del'] = 1;

        return $this->db->update('blood-details', $data, array('bid' => $bid));
    }

    public function recrdel($rid)
    {
        $data['rec_del'] = 1;

        return $this->db->update('requests', $data, array('rid' => $rid));
    }
}