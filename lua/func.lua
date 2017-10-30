-- 将函数作为参数传递给函数
argFunc = function(param)
  print("test func as param - ###", param, "###")
end

function add(num_1, num_2, argFunc)
  res = num_1 + num_2
  argFunc(res)
end

argFunc(10)
add(7,5, argFunc)

-- 多个返回值
function maxinum(a)
  local mi = 1
  local m = a[mi]
  for i, val in ipairs(a) do
    if val > m then
      mi = i
      m = val
    end
  end
  return m, mi
end

print(maxinum({20, 30, 22, 2, 15, 35, 17}))

-- 可变参数 ... 的使用
function avg(...)
  res = 0
  local arg = {...}
  for i, v in ipairs(arg) do
    res = res + v
  end

  print("总共传入 " .. #arg .. " 个数")
  return res/#arg
end
