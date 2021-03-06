package model;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;

public class DAOBase implements DAO{
	private Connection conn = null;
	public void closeDBResources(ResultSet rs, Statement stmt, 
			PreparedStatement pstmt, Connection conn) {
		//할당된 DB 자원 회수
		if(rs!=null) {
			try {
				rs.close();
			} catch (SQLException e) {
				e.printStackTrace();
			}
		}
		if(stmt!=null) {
			try {
				stmt.close();
			} catch (SQLException e) {
				e.printStackTrace();
			}
		}
		if(pstmt!=null) {
			try {
				pstmt.close();
			} catch (SQLException e) {
				e.printStackTrace();
			}
		}
		if(conn!=null) {
			try {
				conn.close();
			} catch (SQLException e) {
				e.printStackTrace();
			}
		}
	}
	public Connection getConnection() throws SQLException {
		try { // 드러이버 연결
			Class.forName("com.mysql.jdbc.Driver");// ojdbc6.jar 드라이버를 메모리에 적재
		} catch (ClassNotFoundException e) {
			e.printStackTrace();
		} // 파일이 없을수 있기때문에.
		try {
			conn = DriverManager.getConnection("jdbc:mysql://221.147.37.18:3306/team5", 
					"team5", "1234");
			// 연결정보를 이용한 연결(connection) 객체 생성
			return conn;
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		return conn;
	}

}
