package model;

import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.ArrayList;

public class ProductDAO extends DAOBase {
	Connection conn = null;
	Statement stmt = null;
	PreparedStatement pstmt = null;
	ResultSet rs = null;
	ArrayList<ProductDTO> dtoList = null;
	ProductDTO dto = null;
	public int selectCount() {
		int totalRows = 0;
		try {
			conn = getConnection(); // getConnection()은 DAOBase 정의되어 있음.
			stmt = conn.createStatement();
			rs = stmt.executeQuery("select count(*) from product");
			if (rs.next())
				totalRows = rs.getInt(1);
			return totalRows;
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}finally {
			this.closeDBResources(rs, stmt, pstmt, conn);
		}
		return totalRows;
	}

	public ArrayList<ProductDTO> selectList() {
		try {
			conn = getConnection();
			stmt = conn.createStatement();
			rs = stmt.executeQuery("select product.*, country.name as country_name, city.name as city_name, flight.name as flight_name" + 
					"		 from ((product left join country on product.country_no=country.no)" + 
					"		 left join city on product.city_no=city.no)" + 
					"		 left join flight on product.flight_no=flight.no" + 
					"		 where product.price between '100000' and '5000000'"); // +"where id='" + id
																								// "'");
			// statement 객체로 지정된 sql 실행, result set을 반환 받음
			dtoList = new ArrayList<ProductDTO>();
			while (rs.next()) {
				dto = new ProductDTO();
				dto.setNo(rs.getInt(1));
				dto.setIntro(rs.getString(2));
				dto.setName(rs.getString(3));
				dto.setCountry_no(rs.getInt(4));
				dto.setCity_no(rs.getInt(5));
				dto.setHotel_no(rs.getInt(6));
				dto.setDeparture(rs.getString(7));
				dto.setArrive(rs.getString(8));
				dto.setFilght_no(rs.getInt(9));
				dto.setPrice(rs.getInt(10));
				dto.setEvent(rs.getInt(11));
				dto.setStock(rs.getInt(12));
				dto.setPoint(rs.getString(13));
				dto.setGuid(rs.getString(14));
				dto.setRecommend_no(rs.getInt(15));
				dto.setPic1(rs.getString(16));
				dto.setPic2(rs.getString(17));
				dto.setPic3(rs.getString(18));
				dto.setPic4(rs.getString(19));
				dto.setPic5(rs.getString(20));
				dtoList.add(dto);
			}
			//rs.close();			stmt.close();			conn.close();
			//메모리를 할당받으면 만들어진 순서의 역순으로 반환해줘야함.
			return dtoList;
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}finally {
			this.closeDBResources(rs, stmt, pstmt, conn);
		}
		return dtoList;
	}

}
