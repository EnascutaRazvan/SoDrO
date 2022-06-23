import java.io.File;
import java.io.FileNotFoundException;
import java.nio.file.Paths;
import java.util.ArrayList;
import java.util.Arrays;
import java.util.List;
import java.util.Scanner;

public class Application {
    public static void main(String[] args) {
        try {
            int count = 0;
            List<Product> productList = new ArrayList<>();
            File myObj = new File("C:\\xampp\\htdocs\\SoDrO\\dbPoP\\src\\main\\resources\\products.txt");
            Scanner myReader = new Scanner(myObj);
            while (myReader.hasNextLine()) {
                String data = myReader.nextLine();
                if(data.contains("name@price@quantity@category@ingredients@ countries@stores") || data.contains("https://") || data.equals(""))
                    continue;
                //System.out.println(data);
                //System.out.println();

                List<String> listOfFields = new ArrayList<>(Arrays.asList(data.split("@")));
                count++;
                if(listOfFields.size() == 6)
                    listOfFields.add(" ");
                listOfFields.add("./assets/img/drinks/" + listOfFields.get(0) +  ".jpg");
                Product product1 = new Product();
                productList.add(product1);

                product1.setName(listOfFields.get(0));
                product1.setPrice(listOfFields.get(1));
                product1.setQuantity(listOfFields.get(2));
                product1.setCategory(listOfFields.get(3));
                product1.setIngredients(listOfFields.get(4));
                product1.setCountries(listOfFields.get(5));
                product1.setStores(listOfFields.get(6));
                product1.setPathing(listOfFields.get(7));

            }
            myReader.close();

            DataBaseService dataBaseService = new DataBaseService();

            dataBaseService.addProducts(productList);

        } catch (FileNotFoundException e) {
            System.out.println("An error occurred.");
            e.printStackTrace();
        }
    }
}
