import java.util.Objects;

public class Product {

    private String name;
    private String price;
    private String quantity;
    private String category;
    private String ingredients;
    private String countries;
    private String stores;
    private String pathing;

    public Product() {
    }

    public void setName(String name) {
        this.name = name;
    }

    public void setPrice(String price) {
        this.price = price;
    }

    public void setQuantity(String quantity) {
        this.quantity = quantity;
    }

    public void setCategory(String category) {
        this.category = category;
    }

    public void setIngredients(String ingredients) {
        this.ingredients = ingredients;
    }

    public void setCountries(String countries) {
        this.countries = countries;
    }

    public void setStores(String stores) {
        this.stores = stores;
    }

    public void setPathing(String pathing) {
        this.pathing = pathing;
    }

    public String getName() {
        return name;
    }

    public String getPrice() {
        return price;
    }

    public String getQuantity() {
        return quantity;
    }

    public String getCategory() {
        return category;
    }

    public String getIngredients() {
        return ingredients;
    }

    public String getCountries() {
        return countries;
    }

    public String getStores() {
        return stores;
    }

    public String getPathing() {
        return pathing;
    }

    @Override
    public String toString() {
        return "Product{" +
                "name='" + name + '\'' +
                ", price='" + price + '\'' +
                ", quantity='" + quantity + '\'' +
                ", category='" + category + '\'' +
                ", ingredients='" + ingredients + '\'' +
                ", countries='" + countries + '\'' +
                ", stores='" + stores + '\'' +
                ", pathing='" + pathing + '\'' +
                '}';
    }

    @Override
    public boolean equals(Object o) {
        if (this == o) return true;
        if (o == null || getClass() != o.getClass()) return false;
        Product product = (Product) o;
        return Objects.equals(name, product.name) && Objects.equals(price, product.price) && Objects.equals(quantity, product.quantity) && Objects.equals(category, product.category) && Objects.equals(ingredients, product.ingredients) && Objects.equals(countries, product.countries) && Objects.equals(stores, product.stores) && Objects.equals(pathing, product.pathing);
    }

    @Override
    public int hashCode() {
        return Objects.hash(name, price, quantity, category, ingredients, countries, stores, pathing);
    }


}
