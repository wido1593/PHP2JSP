<?
    class Admin_hotel_m extends CI_Model
    {
        public function getlist($text1,$start,$limit)
        {
         if (!$text1)
        $sql="select hotel. *, country.name as country_name,city.name as city_name
		 from (hotel left join country on hotel.country_no=country.no) left join city on hotel.city_no=city.no
		 order by name limit $start,$limit";    // 전체 자료
		else
        $sql="select hotel. *, country.name as country_name, city.name as city_name
		from (hotel left join country on hotel.country_no=country.no) left join city on hotel.city_no=city.no where hotel.name like '%$text1%' order by name limit $start,$limit"; 
		 return $this->db->query($sql)->result();
        }
		public function rowcount( $text1 ) {
		if (!$text1)
			$sql="select hotel. *, country.name as country_name from hotel left join country on hotel.country_no=country.no order by name";
		else
			$sql="select hotel. *, country.name as country_name from hotel left join country on hotel.country_no=country.no where country.name like '%$text1%' order by name";

		return $this->db->query($sql)->num_rows();
		}

		public function getrow($no){
		$sql="select hotel. *, country.name as country_name, city.name as city_name
		from (hotel left join country on hotel.country_no=country.no) left join city on hotel.city_no=city.no where hotel.no=$no";
		return  $this->db->query($sql)->row();
		}

		function deleterow($no)  {
		$sql="delete from hotel where no=$no";
		return  $this->db->query($sql);
		}
		function insertrow($row)
		{
		return $this->db->insert("hotel",$row);
		}
		function updaterow( $row, $no )
		{
		$where=array( "no"=>$no );
		return $this->db->update( "hotel", $row, $where );
		}
    }
?>