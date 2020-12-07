package Controller;

import java.io.IOException;
import java.sql.SQLException;
import java.util.ArrayList;

import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import javax.servlet.http.HttpSession;
import javax.servlet.http.Part;

import model.ProductDAO;
import model.ProductDTO;
import service.Pagination;

/**
 * Servlet implementation class ProductController
 */
@WebServlet({ "/ProductController", "/product_list.do", "/product_reservation.do", "/product_view.do" })
public class ProductController extends HttpServlet {
	private static final long serialVersionUID = 1L;
       
    /**
     * @see HttpServlet#HttpServlet()
     */
    public ProductController() {
        super();
        // TODO Auto-generated constructor stub
    }
    ArrayList<ProductDTO> dtoList = null;// new ArrayList<MemberDTO>(); // ��ũ��鿡 ���� ���հ�ü
	ProductDTO dto = null; // ���ڵ�� ���εǴ� ��ü
	HttpSession session = null;
	ProductDAO dao = new ProductDAO();
	Pagination pn = new Pagination();
    protected void process(HttpServletRequest request, HttpServletResponse response)
			throws ServletException, IOException, SQLException {
    	request.setCharacterEncoding("UTF-8");
    	System.out.println("@@");
    	String uri = request.getRequestURI();
		int lastIndex = uri.lastIndexOf('/');
		String action = uri.substring(lastIndex + 1); // ����� ���������� �߶��!
		if (action.equals("product_list.do"))
			list(request, response);
    }
	/**
	 * @see HttpServlet#doGet(HttpServletRequest request, HttpServletResponse response)
	 */
    protected void list(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		// TODO Auto-generated method stub
    	System.out.println(request.getParameter("sortType"));
		int totalRows = 0;// ��ü ��ǰ��, ���ڵ� or ���� ��
		totalRows = dao.selectCount();
		System.out.println(totalRows);
		int rowsPerPage = 3; // �� �������� ��Ÿ���� ��ǰ ��
		int paginationPerPage = 2;// �� �������� ��Ÿ���� ������ ��ȣ ��
		int pageNum = 1;
		if(request.getParameter("pageNum") != null) {
			pageNum = Integer.parseInt(request.getParameter("pageNum")); //��û�� ���� ��ȣ ��
			if(pageNum <= 0)
				pageNum = 1;
		}
		pn.processPaging(totalRows, pageNum, rowsPerPage, paginationPerPage);
		//if((dtoList = dao.selectListBetween(pn.getStartRow(),pn.getEndRow(),request.getParameter("sortType"))) != null) {
		
		if((dtoList = dao.selectList()) != null) {
		request.setAttribute("productList", dtoList);
		request.setAttribute("pagination",pn);

		request.setAttribute("sortType", request.getParameter("sortType"));
		System.out.println("@@");
		request.getRequestDispatcher("product_list.jsp").forward(request, response);
		} else {
			request.getRequestDispatcher("fail.jsp").forward(request, response);
		}
	}
	

	protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		// TODO Auto-generated method stub
		try {
			process(request, response);
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
	}

	/**
	 * @see HttpServlet#doPost(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		// TODO Auto-generated method stub
		try {
			process(request, response);
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
	}

}
