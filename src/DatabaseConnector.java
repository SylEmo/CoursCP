import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.SQLException;

import javax.naming.Context;
import javax.naming.InitialContext;
import javax.naming.NamingException;
import javax.sql.DataSource;

/**
 *  This class provides unique access to the data source regarding DB connection from the server.xml
 */
public class DatabaseConnector {
	
	private DataSource _connectorDatasource;
	
	public DatabaseConnector() {
		try{
			initializeDatasource();
		}catch(Exception e){
			//TODO: Replace by logging service
			System.out.println(e.getMessage());
		}		
	}
	
	private void initializeDatasource() throws NamingException{
		InitialContext ic = new InitialContext();
		Context xmlContext = (Context) ic.lookup("java:comp/env");
		_connectorDatasource = (DataSource) xmlContext.lookup("jdbc/coursCP-dbConnector");
	}
		
	public Connection getConnection() throws SQLException, NamingException{
		if(_connectorDatasource == null ){
			initializeDatasource();
		}
		
		//Gets the connection
		Connection dbCon = _connectorDatasource.getConnection();
		
		//Ensure the data will be throw UTF-8 on client side
		String DBEncoding = "UTF-8";
		PreparedStatement statement = dbCon.prepareStatement("SET CLIENT_ENCODING TO '" + DBEncoding + "'");
		statement.execute();
		
		return dbCon;
	}
}

