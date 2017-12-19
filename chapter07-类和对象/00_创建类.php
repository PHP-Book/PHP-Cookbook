<?php

/* 创建类 -------------------------------------------------------- */
// 使用关键字 class 创建一个类
// class 类名 {}
class guest_book {

    // 使用关键字 public 声明一个属性, 可以隐藏类的所有变量
    public $comments;

    // 声明属性的同时进行赋值, 但只能是常量
    public $last_visitor = 'Donnan';
    public $str = 'Chris' . '9'; // 正确
//    public $last_visitor = strtoupper('Smith'); // 错误
//    public $last_visitor = $this->str; // 错误

    public function update($comment, $visitor) {
        if (!empty($comment)) {
            // 在类方法中对类属性赋的值可以是变量
            array_unshift($this->comments, $comment);
            $this->last_visitor = $visitor;
        }
    }

    /**
     * $this是一个特殊的变量, 指代当前对象.
     * 所以要从一个对象中访问该对象的$last_visitor属性, 可以使用$this->last_visitor访问.
     * $this->$last_visitor 和 $this->last_visitor是不同的.
        * $this->$last_visitor 的意思是, 访问这个对象的属性名为 $last_visitor 的值. 而我们的目的是想要访问属性名为last_visitor的值. 所以注意不要写错, 否则就会访问到一个空值, 因为大多数情况下是没有名为 $last_visitor 的属性.
     */


    /**
     * 每个类中都存在一个名为__construct的函数, 在实例化对象的时候自动调用. 这个函数称为类构造函数.
     */

    /**
     * guest_book constructor. guest_book类的构造函数
     * @param $user string
     */
    public function __construct($user)
    {
        // 可以在类构造函数中给属性赋 非常量值.
        $this->comments = $user;
       $this->last_visitor = strtoupper('Smith');
    }


}




/* 实例化对象 -------------------------------------------------------- */

// 使用 new 关键字进行对象实例化. 参数对应的是类构造函数中的参数
$obj1 = new guest_book('Tom');
// 使用 -> 访问属性和方法
print_r($obj1->last_visitor);

// 还可以在对象实例化时直接调用一个方法或访问一个属性
$last_visitor = (new guest_book('stewart'))->last_visitor;
$last_visitor = (new guest_book('stewart'))->getLastVisitor(); // 方法调用成功, 但同时也报错.
print_r($last_visitor);





/* 静态方法 -------------------------------------------------------- */

// 使用 :: 访问静态方法
// 静态方法对于一个类的所有势力都是一样的, 因为它们不依赖于实例特定的数据.
// 注意: 静态方法中没有$this. 可以使用self代表该类.
class convert {
    // 使用关键字 static 定义静态方法
    /**
     * 从摄氏度转换为华氏度
     * @param $degrees 摄氏度数
     * @return float 返回华氏度数
     */
    public static function c2f($degrees) {

        return(1.8 * $degrees) + 32;
    }
}
// 直接使用类名和::调用静态方法
$f = convert::c2f(100); // 输出212





/* 实现继承 -------------------------------------------------------- */

// 使用 extends 关键字 扩展现有的类来实现继承

class DB {
    public $result;
    function getResult() {
        return $this->result;
    }

    function query($sql) {
        error_log("query() must be overridden by a database-specific child");
        return false;
    }
}

/**
 * Class MySQL
 * MySQL 类 继承了 DB类
 */
class MySQL extends DB {
    // MySQL类继承了DB类的属性和方法

    // MySQL也可以重写父类的属性和方法
    function query($sql)
    {
        $this->result = mysqli_query($sql);
        parent::query(); // 使用parent::调用父类的方法.
    }
}










