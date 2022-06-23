import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;

public class DataBaseConnection {

    private static final String url = "jdbc:mysql://localhost:3306/sodrodatabase";
    private static final String userName = "root";
    private static final String password = "";
    private Connection connection;

    public DataBaseConnection() {
        try {
            this.connection = DriverManager.getConnection(url, userName, password);

            System.out.println("Connected to Microsoft DB");
        } catch (SQLException e) {
            e.printStackTrace();
        }
    }


    public Connection getConnection() {
        return connection;
    }
}
