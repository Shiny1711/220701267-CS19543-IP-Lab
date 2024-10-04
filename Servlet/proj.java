

import java.io.IOException;
import java.io.PrintWriter;

import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

/**
 * Servlet implementation class proj
 */
@WebServlet("/proj")
public class proj extends HttpServlet {
	private static final long serialVersionUID = 1L;

	/**
	 * @see HttpServlet#doGet(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		// TODO Auto-generated method stub
//		response.getWriter().append("Served at: ").append(request.getContextPath());
		response.setContentType("text/html");
		PrintWriter out = response.getWriter();
		
		String name = request.getParameter("name");
		String rollno = request.getParameter("rollno");
		String gender = request.getParameter("gender");
		String year = request.getParameter("year");
		String department = request.getParameter("department");
		String section = request.getParameter("section");
		String mobile_no = request.getParameter("mobile_no");
		String email = request.getParameter("email");
		String address = request.getParameter("address");
		String city = request.getParameter("city");
		String country = request.getParameter("country");
		String pincode = request.getParameter("pincode");
		
		
		out.println("<html><body>");
		out.println("<head>");
		out.println("<link rel=\"stylesheet\"href=\"./style.css\">");
		out.println("<head>");
		out.println("<table class=\"hell\">");
		out.println("<h2>Registered Details</h2>");
		out.println("<tr>");
		out.println("<td><b>Student Name:</b></td>");
		out.println("<td>"+name+"</td>");
		out.println("</tr>");
		out.println("<tr>");
		out.println("<td><b>Roll Number:</b></td>");
		out.println("<td>"+rollno+"</td>");
		out.println("</tr>");
		out.println("<tr>");
		out.println("<td><b>Gender:</b></td>");
		out.println("<td>"+gender+"</td>");
		out.println("</tr>");
		out.println("<tr>");
		out.println("<td><b>Year:</b></td>");
		out.println("<td>"+year+"</td>");
		out.println("</tr>");
		out.println("<tr>");
		out.println("<td><b>Department:</b></td>");
		out.println("<td>"+department+"</td>");
		out.println("</tr>");
		out.println("<tr>");
		out.println("<td><b>Section:</b></td>");
		out.println("<td>"+section+"</td>");
		out.println("</tr>");
		out.println("<tr>");
		out.println("<td><b>Mobile Number:</b></td>");
		out.println("<td>"+mobile_no+"</td>");
		out.println("</tr>");
		out.println("<tr>");
		out.println("<td><b>E-Mail ID:</b></td>");
		out.println("<td>"+email+"</td>");
		out.println("</tr>");
		out.println("<tr>");
		out.println("<td><b>Address:</b></td>");
		out.println("<td>"+address+"</td>");
		out.println("</tr>");
		out.println("<tr>");
		out.println("<td><b>City:</b></td>");
		out.println("<td>"+city+"</td>");
		out.println("</tr>");
		out.println("<tr>");
		out.println("<td><b>Country:</b></td>");
		out.println("<td>"+country+"</td>");
		out.println("</tr>");
		out.println("<tr>");
		out.println("<td><b>Pincode:</b></td>");
		out.println("<td>"+pincode+"</td>");
		out.println("</tr>");
		out.println("</table>");
		out.println("</body></html>");


	}

	/**
	 * @see HttpServlet#doPost(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		// TODO Auto-generated method stub
		doGet(request, response);
	}

}
