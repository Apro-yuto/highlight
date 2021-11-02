import React from 'react'
import WorkerList from '@/js/components/Example'

const Reg:React.VFC = (props) => {
  return (
    <>
      <WorkerList workerArr={props.data} />
    </>
  )
}

export default Reg
