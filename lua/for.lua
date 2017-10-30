


a = 10

-- [while ] --

while(a < 20)
do
  print("a的值为:", a)
  a = a + 1
  if (a > 15) then
    --[break --]
    break
  end
end

-- a的值为:        10
-- a的值为:        11
-- a的值为:        12
-- a的值为:        13
-- a的值为:        14
-- a的值为:        15

-- repeat
--   line = os.read()
-- until line ~= ""
-- print(line)


-- 一些函数
str, sth = string.find("hello world", "world")
print(str, sth)
-- 7       11

for word in string.gmatch("Gitvim.com is a good namespace~", "%a+") do 
  print(word)
end

--[[
  Gitvim
  com
  is
  a
  good
  namespace
]]--


--[[
  string.sub()
  string.gsub()
  string.reverse()
  string.format()
  string.char()
  string.byte()
  string.len()
  string.rep()  -- 拷贝
  string.match()
  string.upper()
  string.lower()
]]--
