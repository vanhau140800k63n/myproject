import java.util.Scanner;

class Main {
    public static String message(String logLine) {
        throw new UnsupportedOperationException("Please implement the (static) LogLine.message() method");
    }

    public static String logLevel(String logLine) {
        throw new UnsupportedOperationException("Please implement the (static) LogLine.logLevel() method");
    }

    public static String reformat(String logLine) {
        throw new UnsupportedOperationException("Please implement the (static) LogLine.reformat() method");
    }

    public static void main(String[] args) {
        Scanner reader = new Scanner(System.in);
        String str = reader.nextLine();
        
        System.out.println(message(str));
        System.out.println(logLevel(str));
        System.out.println(reformat(str));
    }
}
