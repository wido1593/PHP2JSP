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
		//�Ҵ�� DB �ڿ� ȸ��
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
		try { // �巯�̹� ����
			Class.forName("com.mysql.jdbc.Driver");// ojdbc6.jar ����̹��� �޸𸮿� ����
		} catch (ClassNotFoundException e) {
			e.printStackTrace();
		} // ������ ������ �ֱ⶧����.
		try {
			conn = DriverManager.getConnection("jdbc:mysql://221.147.37.18:3306/team5", 
					"team5", "1234");
			// ���������� �̿��� ����(connection) ��ü ����
			return conn;
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		return conn;
	}

}
