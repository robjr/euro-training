package DetectCycle;

import java.util.HashMap;
import java.util.Map;

/**
 * Detect a cycle problem
 *
 * @see problem.pdf
 * @see https://www.hackerrank.com/challenges/ctci-linked-list-cycle
 */

public class Node {
    
    int data;
    Node next;
    
    public static boolean hasCycle(Node head) {
        Map<Node, Node> visitedNodes = new HashMap<Node, Node>();

        Node currentNode = head;

        while (currentNode != null) {

            if (visitedNodes.containsKey(currentNode))
                return true;

            visitedNodes.put(currentNode, currentNode);
            currentNode = currentNode.next;    
        }

        return false;
    }

    public void setNext(Node next) {
        this.next = next;
    }
}
