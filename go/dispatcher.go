package tasks

var (
	MaxQueue   = 10000 // 最大队列
	MaxWorkder = 500   // 最大 workder 并发数量
)

var JobQueue chan Job

func init() {
	JobQueue = make(chan Job, MaxQueue)
}

// Job 三叉戟之三: 执行任务的抽象接口
type Job interface {
	Do() error
}

// Workder 三叉戟之二: 实际工作者
type Worker struct {
	WorkerPool chan chan Job
	JobChannel chan Job
	quit       chan bool
}

// NewWorker 实例化一个 Worker
func NewWorker(workerPool chan chan Job) Worker {
	return Worker{
		WorkerPool: workerPool,
		JobChannel: make(chan Job),
		quit:       make(chan bool),
	}
}

// Start 协程 High 起来, 啦啦啦，葫芦娃，葫芦娃，一根藤上七个瓜，大家一起来
func (w Worker) Start() {
	go func() {
		for {
			w.WorkerPool <- w.JobChannel
			select {
			case job := <-w.JobChannel:
				job.Do()
			case <-w.quit:
				return
			}
		}
	}()
}

// Stop 给Worker 一个退出的标记
func (w Worker) Stop() {
	go func() {
		w.quit <- true
	}()
}

// Dispatcher 三叉戟之首: 分发器
type Dispatcher struct {
	WorkerPool chan chan Job
	maxWorkers int
}

func NewDispatcher() *Dispatcher {
	pool := make(chan chan Job, MaxWorkder)
	return &Dispatcher{
		WorkerPool: pool,
		maxWorkers: MaxWorkder,
	}
}

// 实例化最大数量的worker, 并保存在worker池内
func (d *Dispatcher) Run() {
	for i := 0; i < d.maxWorkers; i++ {
		worker := NewWorker(d.WorkerPool)
		worker.Start()
	}
	go d.dispatcher()
}

// dispatcher 任务调度分发
func (d *Dispatcher) dispatcher() {
	for {
		select {
		case job := <-JobQueue:
			go func(job Job) {
				jobChannel := <-d.WorkerPool
				jobChannel <- job
			}(job)
		}
	}
}
