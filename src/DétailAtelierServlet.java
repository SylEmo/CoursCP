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
@WebServlet("/detail-atelier")
public class DétailAtelierServlet extends HttpServlet {

	/* (non-Javadoc)
	 * @see javax.servlet.http.HttpServlet#doGet(javax.servlet.http.HttpServletRequest, javax.servlet.http.HttpServletResponse)
	 */
	@Override
	protected void doGet(HttpServletRequest req, HttpServletResponse resp)
			throws ServletException, IOException {
		RequestDispatcher rd = null;
		Connection dbConnection = null;
		PreparedStatement preparedStatement = null;
		ResultSet resultSet = null;
		int id = (int) req.getAttribute("id");
		
		try{
			dbConnection = new DatabaseConnector().getConnection();
			preparedStatement = dbConnection.prepareStatement(ListOfQueries.QUERY_GET_DETAILS_ATELIER);
			preparedStatement.setInt(1, id);
			
			resultSet = preparedStatement.executeQuery();
			/*Laboratoire laboratoire = new Laboratoire(req.getSession().getAttribute("labId"), 
					, lieu)
			Atelier atelier = new Atelier(id, resultSet.getString("theme"), 
					resultSet.getString("titre"), resultSet.getInt("duree"),
					resultSet.getInt("capacite"));*/ 
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
    	rd = req.getRequestDispatcher("/DetailsAtelier.jsp");
    	rd.forward(req, resp);
	}

	/* (non-Javadoc)
	 * @see javax.servlet.http.HttpServlet#doPost(javax.servlet.http.HttpServletRequest, javax.servlet.http.HttpServletResponse)
	 */
	@Override
	protected void doPost(HttpServletRequest req, HttpServletResponse resp)
			throws ServletException, IOException {
		RequestDispatcher rd = null;
    	rd = req.getRequestDispatcher(".jsp");
    	rd.forward(req, resp);
	}

}
