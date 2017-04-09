package DetectCycle;

/**
 *
 * @author robjr
 */
public class Application {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        Node node1 = new Node();
        Node node2 = new Node();
        Node node3 = new Node();
        
        node1.setNext(node2);
        node2.setNext(node3);
        node3.setNext(node2);
       
        System.out.println(Node.hasCycle(node1));
    }
    
}
