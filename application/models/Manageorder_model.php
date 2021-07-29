<?php

class Manageorder_Model extends CI_Model
{

    public function manage_order_info()
    {
        $this->db->select('*');
        $this->db->from('order_tbl');
        $this->db->join('customer', 'customer.customer_id = order_tbl.customer_id');
        $this->db->join('shipping', 'shipping.shipping_id = order_tbl.shipping_id');
        $result = $this->db->get();
        return $result->result();
    }

    public function order_info_by_id($order_id)
    {
        $this->db->select('*');
        $this->db->from('order_tbl');
        $this->db->where('order_id', $order_id);
        $result = $this->db->get();
        return $result->row();
    }

    public function customer_info_by_id($custoemr_id)
    {
        $this->db->select('*');
        $this->db->from('customer');
        $this->db->where('customer_id', $custoemr_id);
        $result = $this->db->get();
        return $result->row();
    }

    public function shipping_info_by_id($shipping_id)
    {
        $this->db->select('*');
        $this->db->from('shipping');
        $this->db->where('shipping_id', $shipping_id);
        $result = $this->db->get();
        return $result->row();
    }

    public function payment_info_by_id($payment_id)
    {
        $this->db->select('*');
        $this->db->from('payment');
        $this->db->where('payment_id', $payment_id);
        $result = $this->db->get();
        return $result->row();
    }

    public function orderdetails_info_by_id($order_id)
    {
        $this->db->select('*');
        $this->db->from('order_detail');
        $this->db->where('order_id', $order_id);
        $result = $this->db->get();
        return $result->result();
    }

}
