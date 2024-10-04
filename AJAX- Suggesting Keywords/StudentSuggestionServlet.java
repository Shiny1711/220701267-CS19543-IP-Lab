import java.io.IOException;
import java.io.PrintWriter;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
@WebServlet("/StudentSuggestionServlet")
public class StudentSuggestionServlet extends HttpServlet {
    private static final long serialVersionUID = 1L;
    private String[] students = {"John", "Jane", "James", "Jennifer", "Jack", "Julia", "Jacob", "Swetha", "Sneha", "Shiny", "Hariharan","ram","ravi","raju", "Prasanth", "Varun", "Tharun", "Lakshitha", "Rahul", "Bhuvaneswari", "Monica"};
    protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
        String b = request.getParameter("query").toLowerCase();
        response.setContentType("text/html");
        PrintWriter out = response.getWriter();
        for (String student : students) {
            if (student.toLowerCase().startsWith(b)) {
                out.println("<p>" + student + "</p>");
            }
        }
    }
}
