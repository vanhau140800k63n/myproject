import java.util.Scanner;
class Main {
    // TODO: define the 'expectedMinutesInOven()' method

    // TODO: define the 'remainingMinutesInOven()' method

    // TODO: define the 'preparationTimeInMinutes()' method

    // TODO: define the 'totalTimeInMinutes()' method

    public static int expectedMinutesInOven() {
        return 0;
    }

    public static int remainingOvenTime(int actualMinutesInOven) {
        return 0;
    }

    public static int preparationTime(int numberOfLayers) {
        return 0;
    }

    public static int elapsedTime(int numberOfLayers, int actualMinutesInOven) {
        return 0;
    }

    public static void main(String[] args) {
        Scanner reader = new Scanner(System.in);
        int actualMinutesInOven = reader.nextInt();
        int numberOfLayers = reader.nextInt();
        
        System.out.println(expectedMinutesInOven());
        System.out.println(remainingOvenTime(actualMinutesInOven));
        System.out.println(preparationTime(numberOfLayers));
        System.out.println(elapsedTime(numberOfLayers, actualMinutesInOven));
    }
}
