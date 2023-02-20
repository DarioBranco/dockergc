from sqlalchemy import Column, Integer, String, Text
from sqlalchemy.ext.declarative import declarative_base

Base = declarative_base()
class inverters_model(Base):
	__tablename__ = 'inverters_model'
	id = Column(Integer, primary_key=True)
	MakeM = Column(Text)
	InvType = Column(Text)
	Size = Column(Text)
	MaxInpPower = Column(Text)
	MaxOutPower = Column(Text)
	Efficiency = Column(Text)
	Type = Column(Text)
