import java.sql.PreparedStatement;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.List;

public class DataBaseService {
    private final DataBaseController dataBaseController = new DataBaseController();

    public void addProducts(List<Product> productList) {
        try {
            String sql = "Insert Into products (name, price, quantity, category, ingredients, countries, stores, pathing) " +
                    "Values (?, ?, ?, ?, ?, ?, ?, ?);";
            PreparedStatement statement = dataBaseController.getDataBaseConnection().getConnection().prepareStatement(String.valueOf(sql), Statement.RETURN_GENERATED_KEYS);
            int count = 0;
            for (Product prod : productList) {
                count++;
                statement.setString(1, prod.getName());
                statement.setString(2, prod.getPrice());
                statement.setString(3, prod.getQuantity());
                statement.setString(4, prod.getCategory());
                statement.setString(5, prod.getIngredients());
                statement.setString(6, prod.getCountries());
                statement.setString(7, prod.getStores());
                statement.setString(8, prod.getPathing());
                statement.addBatch();


                if (count % 50 == 0) {
                    DataBaseController.executeSQL(statement);
                    statement.clearParameters();
                }
            }

            DataBaseController.executeSQL(statement);
            statement.clearParameters();

            statement.close();
        } catch (SQLException e) {
            e.printStackTrace();
        }
    }
}