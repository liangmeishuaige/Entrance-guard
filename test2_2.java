package zhouzhangjielab2.pkg2a;
public class Zhouzhangjielab22a {
    public static void main(String[] args) {
        LinkQueue<Integer> linkQueue=new LinkQueue<Integer>();
        linkQueue.inQueue(0);
        linkQueue.inQueue(1);
        linkQueue.inQueue(2);
        linkQueue.inQueue(3);
        linkQueue.inQueue(4);
        linkQueue.inQueue(5);
        System.out.println("输出为：");
        for(int i=0;!linkQueue.isEmpty();i++){
            System.out.println(linkQueue.outQueue());
        }
        
        
         Queue<Integer> q=new Queue<Integer>(10);
        for(int i=0;i<=10;i++){
            q.inQueue(i);
        }
        System.out.println("输出为：");
        for(int i=0;!q.isEmpty();i++){
            System.out.println(q.out());
        }
        
        Queue1 q2=new Queue1(2);
        q2.push(0);
        q2.push(1);

        System.out.println("输出为：");
        for(int i=0;i<10;i++)
            System.out.println(q2.pop());
    }
    
}
class LinkQueue<T>{
    class Node<T>{
        private T data;
        private Node<T> next;
        public Node(){
            this.data=null;
            this.next=null;
        }
        public Node(T data){
            this.data=data;
            this.next=null;
        }
        public void setNext(Node<T> t){
            this.next=t;
        }
        public T getData(){
            return this.data;
        }
        public Node<T> getNext()
	{
             return this.next;
	}
       
        
    }
     private Node<T> head;//队头
     private Node<T> tail;//队尾
     public LinkQueue(){
            this.head=null;
            this.tail=null;
        }
     public boolean inQueue(T t){
         Node<T> p=new Node<T>(t);
         if(head==null){
             head=p;
             tail=p;
         }
         else{
             tail.next=p;
             tail=p;
         }
         return true;
     }//入队
     public T outQueue(){
         if(head==null)return null;
         else{
             T t=head.getData();
             head=head.next;
             return t;
         }
     }
     public boolean isEmpty(){
         return head==null;
     }

    
}
class Queue <T>{
    private T[] q;
    int head=0;
    int tail=0;
    int count=0;//元素个数
    public Queue(){
        q=(T[])new Object[10];
        this.head=0;
        this.tail=0;
        this.count=0;
    }
    public Queue(int size){
        q=(T[])new Object[size];
        this.head=0;
        this.tail=0;
        this.count=0;
    }
    public boolean inQueue(T t){
        if(count==q.length)return false;
        q[tail++%(q.length)]=t;//如果不为空就放入下一个
        count++;
        return true;
    }//入队
    
    public T out(){
        if(count==0){
            return null;
        }
        count--;
        return q[head++&(q.length)];
    }//
    public boolean isEmpty(){
        return count==0;
    }
}
class Queue1{
    int[] d=null;
    int head=0;
    int tail=0;
    int len=0;//队列长度
    
    public Queue1(int l){
        this.len=l;
        d=new int[l];
    }
    public void push(int x){
        d[tail]=x;
        tail=(tail+1)%len;
    }//入队
    public int pop(){
        head = (head + 1) % len;//实现循环输出(和26句一起)
        return d[head];
    }//出队
}