import java.io.IOException;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;

import javax.naming.NamingException;
import javax.servlet.RequestDispatcher;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;


/**
 * @author Sylvain
 *
 */
@WebServlet("/ajout-atelier")
public class AjoutAtelierServlet extends HttpServlet {

	/* (non-Javadoc)
	 * @see javax.servlet.http.HttpServlet#doGet(javax.servlet.http.HttpServletRequest, javax.servlet.http.HttpServletResponse)
	 */
	@Override
	protected void doGet(HttpServletRequest req, HttpServletResponse resp)
			throws ServletException, IOException {
		RequestDispatcher rd = null;
    	rd = req.getRequestDispatcher("/WEB-INF/ajouter-atelier.jsp");
    	rd.forward(req, resp);
	}

	/* (non-Javadoc)
	 * @see javax.servlet.http.HttpServlet#doPost(javax.servlet.http.HttpServletRequest, javax.servlet.http.HttpServletResponse)
	 */
	@Override
	protected void doPost(HttpServletRequest req, HttpServletResponse resp)
			throws ServletException, IOException {
		RequestDispatcher rd = null;
		Connection dbConnection = null;
		PreparedStatement preparedStatement = null;
		ResultSet resultSet = null;
		
		try{
			dbConnection = new DatabaseConnector().getConnection();
			preparedStatement = dbConnection.prepareStatement(ListOfQueries.QUERY_ADD_ATELIER);
			preparedStatement.setString(1, (String) req.getAttribute("titre"));
			preparedStatement.setString(2, (String) req.getAttribute("theme"));
			preparedStatement.setInt(3, (int) req.getSession().getAttribute("idLabo"));
			preparedStatement.setInt(4, (int) req.getAttribute("duree"));
			preparedStatement.setInt(5, (int) req.getAttribute("capacite"));
			preparedStatement.setInt(6, (int) req.getAttribute("id"));
			
			preparedStatement.executeUpdate();
		}catch(NamingException | SQLException e){
			System.out.println(e.getClass().getName() + " : " + e.getMessage());
		}finally{
			try{
				if(resultSet != null){
					resultSet.close();
				}
				if(preparedStatement != null){
					preparedStatement.close();
				}
				if(dbConnection != null){
					dbConnection.close();
				}
			}catch(SQLException e){
				System.out.println(e.getClass().getName() + " : " + e.getMessage());
			}
		}
    	rd = req.getRequestDispatcher("/");
    	rd.forward(req, resp);
	}

}
