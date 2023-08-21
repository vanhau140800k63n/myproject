import java.util.Scanner;

class Main {
    public static String acronym(String str) {
        return str;
    }    

    public static void main(String args[]) {
        Scanner reader = new Scanner(System.in);
        String str = reader.nextLine();
        System.out.print(acronym(str));
    }
}
