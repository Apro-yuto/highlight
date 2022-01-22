import { useEffect, useState } from 'react'
import { SP_BREAKPOINT, PC_BREAKPOINT } from '@/js/Constants/breakePoint'
import { WindowSize } from '@/js/Types/useGetWindowSize'

const GetWindowSize = (): WindowSize => {
  const getWindowSizes = (): WindowSize => {
    const { innerWidth: width, innerHeight: height }: WindowSize = window
    return {
      width,
      height,
    }
  }

  const [windowSize, setWindowSize] = useState<WindowSize>(getWindowSizes())

  useEffect(() => {
    const resize = (): void => {
      setWindowSize(getWindowSizes())
    }
    window.addEventListener('resize', resize)
  }, [])
  return windowSize
}

export const isBreakePoints = () => {
  const { width } = GetWindowSize()
  let isSp = false,
    isPc = false

  if (width <= SP_BREAKPOINT) isSp = true
  if (width > PC_BREAKPOINT) isPc = true
  return {
    isSp,
    isPc,
  }
}

export default GetWindowSize
