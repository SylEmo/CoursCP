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
@WebServlet("/modifier-atelier")
public class ModifAtelierServlet extends HttpServlet {

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
		int idAtelier = Integer.parseInt(req.getParameter("idAtelier"));
		
		try{
			dbConnection = new DatabaseConnector().getConnection();
			preparedStatement = dbConnection.prepareStatement(ListOfQueries.QUERY_GET_DETAILS_ATELIER);
			preparedStatement.setInt(1, idAtelier);
			
			resultSet = preparedStatement.executeQuery();
			resultSet.next();
			
			Laboratoire laboratoire = new Laboratoire((int) req.getSession().getAttribute("idLabo"), 
					resultSet.getString("nom"), resultSet.getString("lieu"));
			Atelier atelier = new Atelier(idAtelier, resultSet.getString("titre"),
					resultSet.getString("theme"), laboratoire, resultSet.getInt("duree"),
					resultSet.getInt("capacite"));
			Horaire horaire = new Horaire(resultSet.getInt("id"), resultSet.getBoolean("lundi_m"), resultSet.getBoolean("lundi_ap"), 
					resultSet.getBoolean("mardi_m"), resultSet.getBoolean("mardi_ap"), 
					resultSet.getBoolean("mercrendi_m"), resultSet.getBoolean("mercredi_ap"),
					resultSet.getBoolean("jeudi_m"), resultSet.getBoolean("jeudi_ap"),
					resultSet.getBoolean("vendredi_m"), resultSet.getBoolean("vendredi_ap"), atelier);
			
			req.setAttribute("atelier", atelier);
			req.setAttribute("laboratoire", laboratoire);
			req.setAttribute("horaire", horaire);
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
    	rd = req.getRequestDispatcher("/WEB-INF/modifier-atelier.jsp");
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
		PreparedStatement preparedStatementAtelier = null, preparedStatementHoraire = null;
		ResultSet resultSetAtelier = null, resultSetHoraire = null;
		int idAtelier = (int) req.getAttribute("idAtelier"), idHoraire = (int) req.getAttribute("idHoraire");
		
		try{
			dbConnection = new DatabaseConnector().getConnection();
			
			preparedStatementAtelier = dbConnection.prepareStatement(ListOfQueries.QUERY_MODIFY_ATELIER);
			preparedStatementAtelier.setString(1, req.getAttribute("titre").toString());
			preparedStatementAtelier.setString(2, req.getAttribute("theme").toString());
			preparedStatementAtelier.setInt(3, (int) req.getSession().getAttribute("idLabo"));
			preparedStatementAtelier.setInt(4, (int) req.getAttribute("duree"));
			preparedStatementAtelier.setInt(5, (int) req.getAttribute("capacite"));
			preparedStatementAtelier.setInt(6, idAtelier);
			
			preparedStatementAtelier.executeUpdate();
			
			preparedStatementHoraire = dbConnection.prepareStatement(ListOfQueries.QUERY_MODIFY_HORAIRE);
			preparedStatementHoraire.setBoolean(1, (boolean) req.getAttribute("lundi_m"));
			preparedStatementHoraire.setBoolean(1, (boolean) req.getAttribute("lundi_ap"));
			preparedStatementHoraire.setBoolean(1, (boolean) req.getAttribute("mardi_m"));
			preparedStatementHoraire.setBoolean(1, (boolean) req.getAttribute("mardi_ap"));
			preparedStatementHoraire.setBoolean(1, (boolean) req.getAttribute("mercredi_m"));
			preparedStatementHoraire.setBoolean(1, (boolean) req.getAttribute("mercredi_ap"));
			preparedStatementHoraire.setBoolean(1, (boolean) req.getAttribute("jeudi_m"));
			preparedStatementHoraire.setBoolean(1, (boolean) req.getAttribute("jeudi_ap"));
			preparedStatementHoraire.setBoolean(1, (boolean) req.getAttribute("vendredi_m"));
			preparedStatementHoraire.setBoolean(1, (boolean) req.getAttribute("vendredi_ap"));
			
			preparedStatementHoraire.executeUpdate();
		}
		catch(NamingException | SQLException e){
			System.out.println(e.getClass().getName() + " : " + e.getMessage());
		}
		finally{
			try{
				if(resultSetAtelier != null){
					resultSetAtelier.close();
				}
				if(preparedStatementAtelier != null){
					preparedStatementAtelier.close();
				}
				if(resultSetHoraire != null){
					resultSetHoraire.close();
				}
				if(preparedStatementHoraire != null){
					preparedStatementHoraire.close();
				}
				if(dbConnection != null){
					dbConnection.close();
				}
			}
			catch(SQLException e){
				System.out.println(e.getClass().getName() + " : " + e.getMessage());
			}
		}
    	rd = req.getRequestDispatcher("/");
    	rd.forward(req, resp);
	}
}
