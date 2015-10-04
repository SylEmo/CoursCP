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
@WebServlet("/")
public class ListeAtelierServlet extends HttpServlet {

	private static final long serialVersionUID = 1L;

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
		
		try{
			dbConnection = new DatabaseConnector().getConnection();
			
			if(req.getSession().getAttribute("idLabo") == null)
				req.getSession().setAttribute("idLabo", 7);
			
			preparedStatement = dbConnection.prepareStatement(ListOfQueries.QUERY_LIST_ATELIER);
			preparedStatement.setInt(1, (int) req.getSession().getAttribute("idLabo"));
			resultSet = preparedStatement.executeQuery();
			
			req.setAttribute("listeAteliers", resultSet);
		}
		catch(NamingException | SQLException e){
			System.out.println(e.getClass().getName() + " : " + e.getMessage());
		}
		finally{
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
			}
			catch(SQLException e){
				System.out.println(e.getClass().getName() + " : " + e.getMessage());
			}
		}
    	rd = req.getRequestDispatcher("/WEB-INF/accueil.jsp");
    	rd.forward(req, resp);
	}

	/* (non-Javadoc)
	 * @see javax.servlet.http.HttpServlet#doPost(javax.servlet.http.HttpServletRequest, javax.servlet.http.HttpServletResponse)
	 */
	@Override
	protected void doPost(HttpServletRequest req, HttpServletResponse resp)
			throws ServletException, IOException {
		throw new ServletException("Appel POST non autorisé sur la servlet.");
	}

}
